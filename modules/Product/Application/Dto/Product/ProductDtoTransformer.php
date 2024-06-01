<?php
declare(strict_types=1);

namespace Modules\Product\Application\Dto\Product;

use Modules\Product\Domain\Entity\Product;
use Modules\Product\Domain\Factory\ProductFactory;

final readonly class ProductDtoTransformer
{
    public function __construct(
        private ProductFactory $factory,
    ) {
    }

    public function getApplication(Product $product): ProductDto
    {
        return new ProductDto(
            $product->getId(),
            $product->getName(),
            $product->getQuantity(),
        );
    }

    public function getDomain(ProductDto $dto): Product
    {
        return $this->factory->create(
            $dto->getName(),
            $dto->getQuantity()
        );
    }
}
