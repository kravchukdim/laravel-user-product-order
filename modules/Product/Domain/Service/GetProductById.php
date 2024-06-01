<?php
declare(strict_types=1);

namespace Modules\Product\Domain\Service;

use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\Repository\GetProductByIdInterface;
use Modules\Product\Domain\ValueObject\ProductId;

final readonly class GetProductById
{
    public function __construct(
        private GetProductByIdInterface $repository
    ) {
    }

    public function get(ProductId $productId): Product
    {
        return $this->repository->get($productId);
    }
}
