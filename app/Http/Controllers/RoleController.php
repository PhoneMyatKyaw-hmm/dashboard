<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-roles');

        $permissionGroups = Permission::select('name', 'group')->get()->groupBy('group');

        return view('admin.roles.create')->with('permissionGroups', $permissionGroups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request, RoleService $roleService)
    {
        $roleService->create($request->validated());

        flash()->success(__('flash.role.createSuccess'));

        return redirect(route('roles.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('update-roles');

        $permissionGroups = Permission::select('name', 'group')->get()->groupBy('group');

        $selectedPermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.roles.edit', compact('permissionGroups', 'role', 'selectedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role, RoleService $roleService)
    {
        $roleService->update($role, $request->validated());

        flash()->success(__('flash.role.updateSuccess'));

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, RoleService $roleService)
    {
        Gate::authorize('delete-roles');

        $roleService->delete($role);

        flash()->success(__('flash.role.deleteSuccess'));
    }
}
