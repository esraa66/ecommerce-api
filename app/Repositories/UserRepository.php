<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Create a new user
     */
    public function create(array $data): User
    {
        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    /**
     * Find user by email
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
