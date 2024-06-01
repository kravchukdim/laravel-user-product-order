<?php

declare(strict_types=1);

namespace Modules\Product\Domain\Repository;

use Modules\Product\Domain\Entity\Product;

interface MakeProductInterface
{
    public function make(Product $product): void;
}
