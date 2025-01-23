<?php

namespace App\Http\Resources;

use App\Services\UrlService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $urlService = resolve(UrlService::class);

        return [
            'originalUrl' => $this->original_url,
            'shortUrl' => $urlService->getShortUrlFromEncodedId($this->encoded_id),
            'requestCount' => $this->request_count,
            'lastRequestedAt' => $this->last_requested_at ?? null
        ];
    }
}
