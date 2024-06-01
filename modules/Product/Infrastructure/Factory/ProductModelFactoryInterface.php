<?php

namespace Modules\Product\Infrastructure\Factory;

use Modules\Product\Infrastructure\Model\Product;

interface ProductModelFactoryInterface
{
    public static function create(string $name, int $quantity, ?string $id = null): Product;
}
