<?php

namespace App\Jobs;

use App\Services\UrlService;
use App\ValueObjects\UrlBatchResult;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ShortenUrls implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly array $values,
        private readonly UrlBatchResult $batch
    ) {}

    /**
     * Execute the job.
     */
    public function handle(UrlService $urlService): void
    {
        $this->batch->setTotal(count($this->values));
        foreach ($this->values as $value) {
            if ($urlService->isValidUrl($value)) {
                $encodedId = $urlService->shortenUrl($value);
                $shortUrl = $urlService->getShortUrlFromEncodedId($encodedId);
                $this->batch->addSuccess(originalUrl: $value, shortUrl: $shortUrl);
            } else {
                $this->batch->addFailure($value);
            }
        }

        $this->batch->complete();
    }
}
