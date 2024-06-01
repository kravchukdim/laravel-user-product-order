<?php
declare(strict_types=1);

namespace Modules\Product\Application\UseCase;

use Modules\Product\Application\Dto\Product\ProductDto;
use Modules\Product\Application\Dto\Product\ProductDtoTransformer;
use Modules\Product\Domain\ValueObject\ProductId;
use Modules\Product\Domain\Service\GetProductById as GetProductByIdService;

final readonly class GetProductById
{
    public function __construct(
        private GetProductByIdService $service,
        private ProductDtoTransformer $transformer,
    ) {
    }

    public function get(ProductId $ProductId): ProductDto
    {
        return $this->transformer->getApplication(
            $this->service->get($ProductId)
        );
    }
}
