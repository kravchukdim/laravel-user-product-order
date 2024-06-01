<?php

namespace Modules\User\Infrastructure\Api\User\Controller;

use Modules\User\Infrastructure\Api\User\Resource\UserResource;
use Modules\User\Infrastructure\Api\UserApiInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Infrastructure\Model\User;

final class GetUserController extends Controller
{
    public function __construct(
        protected UserApiInterface $api,
    ) {
    }

    public function get(Request $request): UserResource
    {
        return new UserResource($this->api->getUser($request->id));
    }

    // test action
    public function list(Request $request)
    {
        return UserResource::collection(User::all());
    }
}
