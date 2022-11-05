<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ServiceException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * @author Václav Gazda <gazdavaclav@gmail.com>
 */
class VerificationController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function verify(Request $request): RedirectResponse
    {
        $user = User::find($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            return redirect()->away(config('app.FRONTEND_VERIFICATION_ALREADY_VERIFIED_URL'));
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));

            return redirect()->away(config('app.FRONTEND_VERIFICATION_SUCCESS_URL'));
        }

        return redirect()->away(config('app.FRONTEND_VERIFICATION_FAIL_URL'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ServiceException
     */
    public function resend(Request $request): JsonResponse
    {
        if (!$request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
        }

        return $this->response([], 200);
    }
}
