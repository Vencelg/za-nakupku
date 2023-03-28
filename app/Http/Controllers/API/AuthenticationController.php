<?php

namespace App\Http\Controllers\API;

use App\Enums\ListingStatusEnum;
use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SendMessageRequest;
use App\Http\Requests\SendPasswordResetRequest;
use App\Models\Listing;
use App\Models\User;
use App\Notifications\MessageNotification;
use DB;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class AuthenticationController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function currentUser(Request $request): JsonResponse
    {
        return $this->response($request->user(), 200);
    }

    /**
     * @param RegisterUserRequest $request
     *
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

        if (!$newUser->hasVerifiedEmail()) {
            $newUser->sendEmailVerificationNotification();
        }

        return $this->response($newUser, 200);
    }

    /**
     * @param LoginUserRequest $request
     *
     * @return JsonResponse
     * @throws ControllerException
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw new ControllerException('Invalid credentials', 400);
        }

        if (!$user->email_verified_at) {
            $user->sendEmailVerificationNotification();
            throw new ControllerException('User not verified', 400);
        }

        $accessToken = $user->createToken('accessToken')->plainTextToken;

        return $this->response([
            'user' => $user,
            'accessToken' => $accessToken
        ], 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return $this->response([], 200);
    }

    /**
     * @param SendPasswordResetRequest $request
     *
     * @return JsonResponse
     */
    public function sendPasswordReset(SendPasswordResetRequest $request): JsonResponse
    {
        if (Password::sendResetLink($request->only('email'))) {
            return $this->response(true, 200);
        }

        return $this->response(false, 200);
    }

    /**
     * @param PasswordResetRequest $request
     *
     * @return JsonResponse
     */
    public function passwordReset(PasswordResetRequest $request): JsonResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);

                $user->save();

                event(new PasswordReset($user));
            }
        );

        $code = 200;
        $errors = false;
        if ($status == Password::INVALID_TOKEN || $status == Password::INVALID_USER) {
            $code = 400;
            $errors = true;
        }

        return $this->response(__($status), $code, $errors);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function favouriteListings(Request $request): JsonResponse
    {
        $listings = $request->user()->favouriteListings;

        return $this->response($listings, 200);
    }

    public function listingsUserBidsOn(Request $request): JsonResponse
    {
        $endedListings = Listing::whereHas('payments', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)
                ->where('status', ListingStatusEnum::ENDED->value);
        })->orderBy('created_at', 'desc')->get();

        $activeListings = Listing::whereHas('payments', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)
                ->whereIn('status', [ListingStatusEnum::ACTIVE, ListingStatusEnum::SOON_ENDING->value]);
        })->orderBy('created_at', 'desc')->get();

        return $this->response([
            'ended' => $endedListings,
            'active' => $activeListings
        ], 200);
    }

    public function authedUserListings(Request $request): JsonResponse
    {
        return $this->response($request->user()->listings()->orderBy('created_at', 'desc')->get(),
            200);
    }

    public function sendMessageToUser(SendMessageRequest $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with email: '. $request->input('email') . ' not found', 400);
        }

        $user->notify(new MessageNotification($request->input('subject'), $request->input('body')));

        return $this->response([], 200);
    }
}
