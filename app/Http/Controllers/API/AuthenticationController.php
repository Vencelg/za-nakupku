<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SendPasswordResetRequest;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;

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

    public function sendPasswordReset(SendPasswordResetRequest $request): JsonResponse
    {
        if (Password::sendResetLink($request->only('email'))) {
            return $this->response(true, 200);
        }

        return $this->response(false, 200);
    }

    public function passwordReset(PasswordResetRequest $request): JsonResponse
    {
        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ]);

            $user->save();

            event(new PasswordReset($user));
        }
        );

        return $this->response(__($status), 200);
    }
}
