<?php

namespace App\Http\Controllers;

use App\Jobs\ShortenUrls;
use App\Services\UrlService;
use App\ValueObjects\UrlBatchResult;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BulkUrlController
{
    public function create(Request $request)
    {
        return Inertia::render('UrlsBulkCreate', [
            'batchId' => $request->input('result', null),
        ]);
    }

    public function store(Request $request, UrlService $urlService)
    {
        $validated = $request->validate([
            'csv' => [
                'required',
                'file',
                'max:'.config('misc.uploads.max_size'),
                'mimes:csv,txt',
            ],
        ]);

        // Get the file
        $file = $request->file('csv');
        // Open the file
        $fileHandle = fopen($file->getPathname(), 'r');

        $values = [];
        // Read each row of the CSV
        while (($row = fgetcsv($fileHandle)) !== false) {
            $values[] = $row[0];
        }
        // Close the file
        fclose($fileHandle);

        $urlBatch = new UrlBatchResult;
        ShortenUrls::dispatch($values, $urlBatch);

        return redirect(route('bulk.create', ['result' => $urlBatch->id]));
    }
}
