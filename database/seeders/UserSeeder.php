<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Kahfi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Kahfi',
            'email' => 'user@gmail.com',
            'password' => bcrypt('jika12345'),
        ]);
        $user->assignRole('user');
        
    }
}
