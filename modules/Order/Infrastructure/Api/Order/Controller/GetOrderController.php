<?php

namespace Modules\Order\Infrastructure\Api\Order\Controller;

use Modules\Order\Infrastructure\Api\Order\Resource\OrderResource;
use Modules\Order\Infrastructure\Api\OrderApiInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Infrastructure\Model\Order;

final class GetOrderController extends Controller
{
    public function __construct(
        protected OrderApiInterface $api,
    ) {
    }

    public function get(Request $request): OrderResource
    {
        return new OrderResource($this->api->getOrder($request->id));
    }

    // test action
    public function list(Request $request)
    {
        return OrderResource::collection(Order::all());
    }
}
