<?php

namespace Modules\Order\Infrastructure\Repository\Product;

use Modules\Order\Domain\Entity\Product;
use Modules\Order\Domain\Repository\ProductRepositoryInterface;
use Modules\Order\Domain\ValueObject\ProductId;
use Modules\Product\Infrastructure\Api\ProductApiInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
      protected ProductApiInterface $api,
    ) {
    }

    public function get(ProductId $productId): Product
    {
        $product = $this->api->getProduct($productId->getId());

        return new Product(
            new ProductId($product->id),
            $product->name,
            $product->quantity
        );
    }
}
