<?php
declare(strict_types=1);

namespace Modules\Order\Domain\Entity;

use Modules\Order\Domain\ValueObject\OrderId;
use Modules\Order\Domain\ValueObject\UserId;
use Illuminate\Support\Collection;

final readonly class Order
{
    public function __construct(
        private OrderId $id,
        private UserId $userId,
        private string $userName,
        private string $address,
        private Collection $items,
    ) {
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getId(): OrderId
    {
        return $this->id;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
