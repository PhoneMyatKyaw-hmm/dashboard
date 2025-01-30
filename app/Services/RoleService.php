<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function create(array $data)
    {
        $role = Role::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
        ]);

        if (isset($data['permissions'])) {
            $role->givePermissionTo($data['permissions']);
        }
    }

    public function update(Role $role, array $data)
    {
        $role->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
        ]);

        if (isset($data['permissions'])) {
            $role->syncPermissions([$data['permissions']]);
        }
    }

    public function delete(Role $role)
    {
        $role->syncPermissions([]);
        $role->delete();
    }
}
