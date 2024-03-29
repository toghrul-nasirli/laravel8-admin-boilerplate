<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        UserService::create($request->validated());

        return redirect()->route('admin.users.index', _lang())->with('success', __('admin.added'));
    }

    public function edit($lang, User $user)
    {
        abort_if($user->id === 1, 401);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function update($lang, User $user, UpdateUserRequest $request)
    {
        UserService::update($user, $request->validated());

        return redirect()->route('admin.users.index', _lang())->with('success', __('admin.saved'));
    }
}
