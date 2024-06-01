<?php

namespace Modules\Product\Infrastructure\Api;


use Modules\Product\Application\UseCase\GetProductById;
use Modules\Product\Application\UseCase\MakeProduct;
use Modules\Product\Infrastructure\Dto\Product\ProductDto;
use Modules\Product\Domain\ValueObject\ProductId;
use \Modules\Product\Application\Dto\Product\ProductDto as ApplicationProductDto;

final class Api implements ProductApiInterface
{
    public function __construct(
        private readonly GetProductById $serviceGetProduct,
        private readonly MakeProduct $serviceMakeProduct,
    ) {
    }

    public function getProduct(string $productId): ProductDto
    {
        $product = $this->serviceGetProduct->get(new ProductId($productId));

        return new ProductDto(
            $product->getProductId()->getId(),
            $product->getName(),
            $product->getQuantity()
        );
    }

    public function makeProduct(string $name, int $quantity): void
    {
        $this->serviceMakeProduct->make(new ApplicationProductDto(new ProductId(null), $name, $quantity));
    }
}
