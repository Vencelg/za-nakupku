<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Notifications\UserCreatedNotification;
use Hash;
use Illuminate\Http\Request;
use Notification;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('main.user.list', [
            'users' => User::withTrashed()->get()->sortBy('id')
        ]);
    }

    public function show(
        int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user = User::withTrashed()->whereId($id)->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        return view('main.user.detail', [
            'user' => $user,
        ]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('main.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $password = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(16))), 0, 16);;

        $newUser = new User([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
            'is_admin' => $request->input('is_admin'),
            'phone_number' => $request->input('phone_number'),
            'location' => $request->input('location'),
        ]);
        $newUser->save();

        Notification::send($newUser, new UserCreatedNotification($newUser->email, $password));

        return redirect()->route('user.detail', ['id' => $newUser->id]);
    }

    public function update(int $id, Request $request)
    {
        $user = User::withTrashed()->whereId($id)->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        $user->update($request->all());

        if ($request->input('verified_status') === '1' && !$user->email_verified_at) {
            $user->markEmailAsVerified();
        } else {
            if ($request->input('verified_status') === '0' && $user->email_verified_at) {
                $user->setAttribute('email_verified_at', null);
            }
        }
        $user->save();

        return redirect()->back()->with('success', 'Model successfully updated');
    }

    public function restore(int $id)
    {
        $user = User::withTrashed()->whereId($id)->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        $user->setAttribute('deleted_at', null);
        $user->save();

        return redirect()->back()->with('success', 'Model successfully restored');
    }

    public function softDelete(int $id)
    {
        $user = User::withTrashed()->whereId($id)->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        $user->delete();

        return redirect()->back()->with('success', 'Model successfully deleted');
    }

    public function delete(int $id)
    {
        $user = User::withTrashed()->whereId($id)->first();
        if (!($user instanceof User)) {
            throw new ControllerException('User with id: ' . $id . ' not found', 400);
        }

        $user->forceDelete();

        return redirect()->route('user');
    }
}
