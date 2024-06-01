<?php
declare(strict_types=1);

namespace Modules\Product\Application\Dto\Product;

use Modules\Product\Domain\ValueObject\ProductId;

final readonly class ProductDto {
    public function __construct(
        private ProductId $productId,
        private string $name,
        private int $quantity,
    ) {
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
