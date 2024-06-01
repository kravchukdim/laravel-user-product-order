<?php

namespace Modules\Product\Infrastructure\Api\Product\Controller;

use Modules\Product\Infrastructure\Api\Product\Resource\ProductResource;
use Modules\Product\Infrastructure\Api\ProductApiInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Infrastructure\Model\Product;

final class GetProductController extends Controller
{
    public function __construct(
        protected ProductApiInterface $api,
    ) {
    }

    public function get(Request $request): ProductResource
    {
        return new ProductResource($this->api->getProduct($request->id));
    }


    // test action
    public function list(Request $request)
    {
        return ProductResource::collection(Product::all());
    }
}
