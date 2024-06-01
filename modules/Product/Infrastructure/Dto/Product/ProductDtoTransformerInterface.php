<?php

namespace Modules\Product\Infrastructure\Dto\Product;

use Modules\Product\Infrastructure\Model\Product;
use Modules\Product\Domain\Entity\Product as ProductEntity;

interface ProductDtoTransformerInterface
{
    public function getModel(ProductEntity $entity): Product;
    public function getEntity(Product $product): ProductEntity;
}
