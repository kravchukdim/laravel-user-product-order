<?php

namespace Modules\Order\Infrastructure\Api\Order\Controller;

use Modules\Order\Infrastructure\Api\OrderApiInterface;
use Modules\Order\Infrastructure\Api\Order\Resource\ResponseResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Infrastructure\Dto\Response\ResponseDto;

final class MakeOrderController extends Controller
{
    public function __construct(
        protected OrderApiInterface $api,
    ) {
    }

    public function make(Request $request): ResponseResource
    {
        $userId = $request->query('userId');
        $address = $request->query('address');
        $products = $request->query('products');
        $this->api->make($userId, $address, collect((array)$products));

        return new ResponseResource(new ResponseDto('ok', 'created'));
    }
}
