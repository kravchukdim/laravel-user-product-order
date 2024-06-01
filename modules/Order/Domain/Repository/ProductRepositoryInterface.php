<?php

declare(strict_types=1);

namespace Modules\Order\Domain\Repository;

use Modules\Order\Domain\Entity\Product;
use Modules\Order\Domain\ValueObject\ProductId;

interface ProductRepositoryInterface
{
    public function get(ProductId $productId): Product;
}
