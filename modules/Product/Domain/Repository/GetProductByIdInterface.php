<?php

declare(strict_types=1);

namespace Modules\Product\Domain\Repository;

use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\ValueObject\ProductId;

interface GetProductByIdInterface
{
    public function get(ProductId $userId): Product;
}
