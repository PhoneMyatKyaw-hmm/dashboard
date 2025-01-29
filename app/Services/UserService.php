<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'admin',
            'is_active' => $data['is_active'] === '1' ? true : false,
        ]);

        $user->assignRole($data['role']);
    }

    public function update(User $user, array $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'admin',
            'is_active' => $data['is_active'] === '1' ? true : false,
        ]);

        $user->syncRoles([$data['role']]);
    }

    public function delete(User $user)
    {

        $user->syncRoles([]);

        $user->delete();
    }
}
