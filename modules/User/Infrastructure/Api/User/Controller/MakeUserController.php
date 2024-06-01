<?php

namespace Modules\User\Infrastructure\Api\User\Controller;

use Modules\User\Infrastructure\Api\User\Resource\ResponseResource;
use Modules\User\Infrastructure\Api\UserApiInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Infrastructure\Dto\Response\ResponseDto;

final class MakeUserController extends Controller
{
    public function __construct(
        protected UserApiInterface $api,
    ) {
    }

    public function make(Request $request): ResponseResource
    {
        $email = $request->query('email');
        $name = $request->query('name');
        $this->api->makeUser($email, $name);

        return new ResponseResource(new ResponseDto('ok', 'created'));
    }
}
