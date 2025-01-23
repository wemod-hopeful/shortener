<?php

namespace App\Http\Controllers;

use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnalyticsController
{
    public function show(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url',
        ]);

        // Handle short URL lookups
        if (Str::startsWith($validated['url'], [
            'http://'.$request->getHost().'/go/',
            'https://'.$request->getHost().'/go/',
        ])) {
            $encodedId = basename(parse_url($validated['url'], PHP_URL_PATH));
            $url = Url::firstWhere('encoded_id', $encodedId);
        } else {
            // Handle original URL lookups
            $url = Url::firstWhere('original_url', $validated['url']);
        }

        if (! $url) {
            abort(404);
        }

        return response()->json(new UrlResource($url));
    }
}
