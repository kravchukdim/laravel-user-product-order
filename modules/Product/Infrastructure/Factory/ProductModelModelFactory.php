<?php

namespace Modules\Product\Infrastructure\Factory;

use Modules\Product\Infrastructure\Model\Product;

final class ProductModelModelFactory implements ProductModelFactoryInterface
{
    public static function create(string $name, int $quantity, ?string $id = null): Product
    {
        return new Product([
            'id' => $id,
            'name' => $name,
            'quantity' => $quantity,
        ]);
    }
}
