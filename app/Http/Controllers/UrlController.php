<?php

namespace App\Http\Controllers;

use App\Http\Resources\UrlResource;
use App\Models\Url;
use App\Rules\IsNotShortUrl;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UrlController
{
    public function index()
    {
        $urls = Url::paginate(10);

        return Inertia::render('UrlsIndex', [
            'urls' => UrlResource::collection($urls),
        ]);
    }

    public function create(Request $request, UrlService $urlService)
    {
        // Display short url if a short url was just created
        $shortUrl = null;
        $originalUrl = null;
        if ($request->input('result')) {
            $url = Url::firstWhere('encoded_id', $request->input('result'));
            if ($url) {
                $shortUrl = $urlService->getShortUrlFromEncodedId($url->encoded_id);
                $originalUrl = $url->original_url;
            }
        }

        return Inertia::render('UrlsCreate', [
            'shortUrl' => $shortUrl,
            'originalUrl' => $originalUrl,
        ]);
    }

    public function store(Request $request, UrlService $urlService)
    {
        $validated = $request->validate([
            'url' => ['required', 'url', new IsNotShortUrl],
        ]);

        $encodedId = $urlService->shortenUrl($validated['url']);

        return redirect(route('urls.create', ['result' => $encodedId]));
    }

    public function redirect($encodedId)
    {
        $url = Url::firstWhere('encoded_id', $encodedId);
        if (! $url) {
            abort(404);
        }

        $url->last_requested_at = now();
        $url->request_count = $url->request_count + 1;
        $url->save();

        return redirect($url->original_url);
    }
}
