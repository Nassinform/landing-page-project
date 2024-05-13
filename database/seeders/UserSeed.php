<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678')
            ]
        ];
        User::insert($users);
    }
}
