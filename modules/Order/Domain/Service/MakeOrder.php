<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Service;

use Modules\Order\Domain\Entity\Order;
use Modules\Order\Domain\Factory\OrderFactory;
use Modules\Order\Domain\Factory\OrderItemFactory;
use Modules\Order\Domain\Repository\OrderRepositoryInterface;
use Modules\Order\Domain\Repository\ProductRepositoryInterface;
use Modules\Order\Domain\Repository\UserRepositoryInterface;
use Modules\Order\Domain\ValueObject\ProductId;
use Modules\Order\Domain\ValueObject\UserId;
use Illuminate\Support\Collection;

final readonly class MakeOrder
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        private ProductRepositoryInterface $productRepository,
        private UserRepositoryInterface $userRepository,
        private OrderItemFactory $itemFactory,
        private OrderFactory $orderFactory,
    ) {
    }

    public function make(UserId $userId, Collection $products, string $address): Order
    {
        $user = $this->userRepository->get($userId);
        $items = collect($products)->map(function (array $product) {
            $productEntity = $this->productRepository->get(new ProductId($product['id']));

            return $this->itemFactory->create(
                $productEntity->getId()->getId(),
                $productEntity->getName(),
                (int)$product['quantity']
            );
        });

        return $this->orderRepository->make($this->orderFactory->create(
            $user->getId()->getId(),
            $user->getName(),
            $address,
            $items
        ));
    }
}
