<?php

namespace Modules\Order\Infrastructure\Api\Order\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'serverName' => $this->user_name,
            'address' => $this->address,
            'items' => OrderItemResource::collection($this->items),
        ];
    }
}
