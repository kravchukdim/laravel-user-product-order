<?php
declare(strict_types=1);

namespace Modules\Product\Domain\Entity;

use Modules\Product\Domain\ValueObject\ProductId;

final readonly class Product
{
    public function __construct(
        private ProductId $id,
        private string $name,
        private int $quantity,
    ) {
    }

    public function getId(): ProductId
    {
        return $this->id;
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
