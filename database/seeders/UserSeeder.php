<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('admin123'),
            'role'              => 'admin',
        ]);

        User::create([
            'name'              => 'postier',
            'email'             => 'postier@postier.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('postier123'),
            'role'              => 'postier',
        ]);

        User::create([
            'name'              => 'user',
            'email'             => 'user@user.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('user123'),
            'role'              => 'user',
        ]);
    }
}
