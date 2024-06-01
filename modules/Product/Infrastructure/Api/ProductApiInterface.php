<?php

namespace Modules\Product\Infrastructure\Api;

use Modules\Product\Infrastructure\Dto\Product\ProductDto;

interface ProductApiInterface
{
    public function getProduct(string $productId): ProductDto;
    public function makeProduct(string $name, int $quantity): void;
}
