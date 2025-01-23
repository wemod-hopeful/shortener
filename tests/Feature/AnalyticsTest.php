<?php

namespace Tests\Feature;

use App\Services\UrlService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_request_analytics_by_short_url(): void
    {
        $url = 'https://google.com';

        $urlService = resolve(UrlService::class);
        $encodedId = $urlService->shortenUrl($url);
        $shortUrl = $urlService->getShortUrlFromEncodedId($encodedId);

        $response = $this->get(route('api.analytics.show', ['url' => $shortUrl]));

        $response->assertStatus(200);

        // Confirm initial values are correct
        $response->assertJson([
            'originalUrl' => $url,
            'shortUrl' => $shortUrl,
            'requestCount' => 0,
        ]);
        $this->assertNull($response->json('lastRequestedAt'));

        // Fetch the short url, which should update the analytics data
        $this->get($shortUrl);

        // Get the analytics again
        $response = $this->get(route('api.analytics.show', ['url' => $shortUrl]));

        // Confirm analytics values are updated
        $response->assertJson([
            'originalUrl' => $url,
            'shortUrl' => $shortUrl,
            'requestCount' => 1,
        ]);
        // This will throw an exception if the value can't be parsed to a valid datetime
        Carbon::parse($response->json('lastRequestedAt'));
    }

    public function test_can_request_analytics_by_original_url(): void
    {
        $url = 'https://bing.com';

        $urlService = resolve(UrlService::class);
        $encodedId = $urlService->shortenUrl($url);
        $shortUrl = $urlService->getShortUrlFromEncodedId($encodedId);

        $response = $this->get(route('api.analytics.show', ['url' => $url]));

        $response->assertStatus(200);

        // Confirm initial values are correct
        $response->assertJson([
            'originalUrl' => $url,
            'shortUrl' => $shortUrl,
            'requestCount' => 0,
        ]);
        $this->assertNull($response->json('lastRequestedAt'));

        // Fetch the short url, which should update the analytics data
        $this->get($shortUrl);

        // Get the analytics again
        $response = $this->get(route('api.analytics.show', ['url' => $url]));

        // Confirm analytics values are updated
        $response->assertJson([
            'originalUrl' => $url,
            'shortUrl' => $shortUrl,
            'requestCount' => 1,
        ]);
        // This will throw an exception if the value can't be parsed to a valid datetime
        Carbon::parse($response->json('lastRequestedAt'));
    }
}
