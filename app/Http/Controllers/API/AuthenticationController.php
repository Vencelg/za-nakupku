<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ControllerException;
use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\ResponseService;
use App\Services\UserService;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class AuthenticationController extends Controller
{
    public function __construct(
        protected UserService $service,
    ){}

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

        event(new Registered($newUser));

        return $this->response($newUser, 200);
    }

    /**
     * @param LoginUserRequest $request
     * @return JsonResponse
     * @throws ControllerException
     * @throws ServiceException
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new ControllerException('Invalid credentials', 400);
        }

        $this->service->checkIfUserIsVerified($user);

        $user->accessToken = $user->createToken('accessToken')->plainTextToken;

        return $this->response([
            'user' => $user,
        ], 200);
    }
}
