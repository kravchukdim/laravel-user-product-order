<?php

namespace Modules\Product\Infrastructure\Dto\Product;

use Modules\Product\Domain\Entity\Product as ProductEntity;
use Modules\Product\Domain\ValueObject\ProductId;
use Modules\Product\Infrastructure\Factory\ProductModelFactoryInterface;
use Modules\Product\Infrastructure\Model\Product;

class ProductDtoTransformer implements ProductDtoTransformerInterface
{
    public function __construct(
        protected ProductModelFactoryInterface $modelFactory,
    ) {
    }

    public function getModel(ProductEntity $entity): Product
    {
        return $this->modelFactory->create($entity->getName(), $entity->getQuantity(), $entity->getId()->getId());
    }

    public function getEntity(Product $product): ProductEntity
    {
        return new ProductEntity(
            new ProductId($product->id),
            $product->name,
            $product->quantity
        );
    }
}
