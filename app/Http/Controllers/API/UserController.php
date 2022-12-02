<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\ResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function show(int $id): JsonResponse
    {
        $user = User::find($id);
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        return $this->response($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws ControllerException
     */
    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $user = User::find($id);
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        if ($user->id != $request->user()->id) {
            throw new ControllerException('Can\'t edit this user', 400);
        }

        $user->update($request->all());
        $user->save();

        return $this->response($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     * @throws ControllerException
     */
    public function destroy(int $id, Request $request): JsonResponse
    {
        $user = User::find($id);
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        if ($user->id != $request->user()->id) {
            throw new ControllerException('Can\'t delete this user', 400);
        }

        $request->user()->currentAccessToken()->delete();
        $user->delete();

        return $this->response([], 200);
    }
}
