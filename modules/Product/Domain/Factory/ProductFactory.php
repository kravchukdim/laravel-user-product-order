<?php
declare(strict_types=1);

namespace Modules\Product\Domain\Factory;

use Illuminate\Support\Str;
use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\ValueObject\ProductId;

final class ProductFactory
{

    public function create(string $name, int $quantity): Product
    {
        return new Product(new ProductId(Str::uuid()->toString()), $name, $quantity);
    }
}
