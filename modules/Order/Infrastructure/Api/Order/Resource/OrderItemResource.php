<?php

namespace Modules\Order\Infrastructure\Api\Order\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class OrderItemResource extends JsonResource
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
            'orderId' => $this->order_id,
            'productId' => $this->product_id,
            'name' => $this->name,
            'quantity' => $this->quantity,
        ];
    }
}
