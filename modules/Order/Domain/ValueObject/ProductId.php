<?php
declare(strict_types=1);

namespace Modules\Order\Domain\ValueObject;

final readonly class ProductId
{
    public function __construct(
        private ?string $id
    ) {

    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
