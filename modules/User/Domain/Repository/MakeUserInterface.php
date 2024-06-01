<?php

declare(strict_types=1);

namespace Modules\User\Domain\Repository;

use Modules\User\Domain\Entity\User;

interface MakeUserInterface
{
    public function make(User $user): void;
}
