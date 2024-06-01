<?php
declare(strict_types=1);

namespace Modules\Product\Domain\Service;

use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\Repository\MakeProductInterface;

final readonly class MakeProduct implements MakeProductInterface
{
    public function __construct(
        private MakeProductInterface $repository
    ) {
    }

    public function make(Product $product): void
    {
        $this->repository->make($product);
    }
}
