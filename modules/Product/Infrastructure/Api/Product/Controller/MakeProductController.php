<?php

namespace Modules\Product\Infrastructure\Api\Product\Controller;

use Modules\Product\Infrastructure\Api\Product\Resource\ResponseResource;
use Modules\Product\Infrastructure\Api\ProductApiInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Infrastructure\Dto\Response\ResponseDto;

final class MakeProductController extends Controller
{
    public function __construct(
        protected ProductApiInterface $api,
    ) {
    }

    public function make(Request $request): ResponseResource
    {
        $quantity = $request->query('quantity');
        $name = $request->query('name');
        $this->api->makeProduct($name, $quantity);

        return new ResponseResource(new ResponseDto('ok', 'created'));
    }
}
