<?php

namespace Modules\Product\Infrastructure\Repository\Product;


use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\Repository\MakeProductInterface;
use Modules\Product\Infrastructure\Dto\Product\ProductDtoTransformerInterface;

class MakeProductRepository implements MakeProductInterface
{
    public function __construct(
      protected ProductDtoTransformerInterface $modelTransformer,
    ) {
    }

    public function make(Product $product): void
    {
        $model = $this->modelTransformer->getModel($product);
        $model->save();
    }
}
