<?php

namespace Modules\User\Infrastructure\Repository\User;


use Modules\User\Domain\Entity\User;
use Modules\User\Domain\Repository\MakeUserInterface;
use Modules\User\Infrastructure\Dto\User\UserDtoTransformerInterface;

class MakeUserRepository implements MakeUserInterface
{
    public function __construct(
      protected UserDtoTransformerInterface $modelTransformer,
    ) {
    }

    public function make(User $user): void
    {
        $model = $this->modelTransformer->getModel($user);
        $model->save();
    }
}
