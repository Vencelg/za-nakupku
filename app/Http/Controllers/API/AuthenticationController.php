<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\JsonResponse;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class AuthenticationController extends Controller
{
    /**
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $newUser = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $newUser->save();

        return $this->response($newUser, 200);
    }

    /**
     * @param LoginUserRequest $request
     * @return JsonResponse
     * @throws ControllerException
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new ControllerException('Invalid credentials', 400);
        }

        $accessToken = $user->createToken('accessToken')->plainTextToken;

        return $this->response([
            'user' => $user,
            'accessToken' => $accessToken
        ], 200);
    }


}
