<?php
declare(strict_types=1);

namespace Modules\User\Domain\Service;

use Modules\User\Domain\Entity\User;
use Modules\User\Domain\Repository\MakeUserInterface;

final readonly class MakeUser implements MakeUserInterface
{
    public function __construct(
        private MakeUserInterface $repository
    ) {
    }

    public function make(User $user): void
    {
        $this->repository->make($user);
    }
}
