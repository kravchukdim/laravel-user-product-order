<?php
declare(strict_types=1);

namespace Modules\Product\Application\UseCase;

use Modules\Product\Application\Dto\Product\ProductDto;
use Modules\Product\Domain\Factory\ProductFactory;
use Modules\Product\Domain\Service\MakeProduct as MakeProductService;

final readonly class MakeProduct
{
    public function __construct(
        private MakeProductService $service,
        private ProductFactory $factory,
    ) {
    }

    public function make(ProductDto $productDto): void
    {
        $this->service->make(
            $this->factory->create($productDto->getName(), $productDto->getQuantity())
        );
    }
}
