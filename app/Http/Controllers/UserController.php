<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('access-users');

        $users = User::all();

        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-users');

        $roles = Role::all();

        return view('admin.users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserService $userService)
    {
        $userService->create($request->validated());

        flash()->success(__('flash.user.createSuccess'));

        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('update-users');

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, UserService $userService)
    {
        $userService->update($user, $request->validated());

        flash()->success(__('flash.user.updateSuccess'));

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, UserService $userService)
    {
        Gate::authorize('delete-users');

        $userService->delete($user);

        flash()->success(__('flash.user.deleteSuccess'));
    }
}
