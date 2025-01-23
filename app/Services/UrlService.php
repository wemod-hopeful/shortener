<?php

namespace App\Services;

use App\Models\Url;
use App\Rules\IsNotShortUrl;
use Illuminate\Support\Facades\Validator;

class UrlService
{
    public function __construct(private readonly EncoderService $encoderService) {}

    public function shortenUrl(string $originalUrl): string
    {
        // Save the original URL in the database
        $url = Url::create(['original_url' => $originalUrl]);

        // Encode the ID into a Base62 string
        $encodedId = $this->encoderService->encodeBase36($url->id);
        $url->encoded_id = $encodedId;
        $url->save();

        return $encodedId;
    }

    public function getShortUrlFromEncodedId($encodedId): string
    {
        return route('urls.redirect', ['encodedId' => $encodedId]);
    }

    public function isValidUrl(string $url): bool
    {
        $validator = Validator::make(
            ['url' => $url],
            ['url' => ['required', 'url', new IsNotShortUrl()]]
        );

        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }
}
