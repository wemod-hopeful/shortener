<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UrlBatchResult
{
    const CACHE_KEY_PREFIX = 'url-batch-';

    public readonly string $id;

    public array $successes;

    public array $failures;

    public bool $completed = false;

    public int $total = 0;

    public static function find(string $id): ?UrlBatchResult
    {
        return Cache::get(self::CACHE_KEY_PREFIX.$id, null);
    }

    public function __construct()
    {
        $this->id = Str::uuid()->toString();

        $this->updateCache();
    }

    public function addSuccess($originalUrl, $shortUrl): void
    {
        $this->successes[] = [
            'originalUrl' => $originalUrl,
            'shortUrl' => $shortUrl,
        ];
        $this->updateCache();
    }

    public function addFailure(string $string): void
    {
        $this->failures[] = $string;
        $this->updateCache();
    }

    public function complete(): void
    {
        $this->completed = true;
        $this->updateCache();
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
        $this->updateCache();
    }

    private function updateCache(): void
    {
        Cache::put(self::CACHE_KEY_PREFIX.$this->id, $this);
    }
}
