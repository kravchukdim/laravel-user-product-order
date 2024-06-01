<?php

namespace Modules\Product\Infrastructure\Api\Product\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
        ];
    }
}
