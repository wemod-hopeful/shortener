<?php

namespace App\Http\Controllers;

use App\ValueObjects\UrlBatchResult;

class BatchController
{
    public function show(string $batchId)
    {
        $batch = UrlBatchResult::find($batchId);
        if (! $batch) {
            abort(404);
        }

        return response()->json($batch);
    }
}
