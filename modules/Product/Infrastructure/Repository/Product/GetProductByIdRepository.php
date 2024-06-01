<?php

namespace Modules\Product\Infrastructure\Repository\Product;

use Modules\Product\Domain\ValueObject\ProductId;
use Modules\Product\Domain\Repository\GetProductByIdInterface;
use Modules\Product\Infrastructure\Dto\Product\ProductDtoTransformerInterface;
use Modules\Product\Infrastructure\Model\Product;
use Modules\Product\Domain\Entity\Product as ProductEntity;

class GetProductByIdRepository implements GetProductByIdInterface
{
    public function __construct(
      protected ProductDtoTransformerInterface $modelTransformer,
    ) {
    }

    public function get(ProductId $productId): ProductEntity
    {
        $product = Product::findOrFail($productId->getId());

        return $this->modelTransformer->getEntity($product);
    }
}
