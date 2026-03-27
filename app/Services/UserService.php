<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Actualiza a senha do utilizador
     *
     * @param User $user
     * @param array $data
     * @return void
     */
    public function updatePassword(User $user, array $data): void
    {
        $user->update([
            'password' => Hash::make($data['new_password']),
        ]);
    }

    public function createUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
    
    public function getAllUsers()
    {
        return User::all();
    }
}