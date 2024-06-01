<?php

namespace Modules\Product\Infrastructure\Dto\Product;

final readonly class ProductDto {
    public function __construct(
        public string $id,
        public string $name,
        public int $quantity,
    ) {
    }
}
