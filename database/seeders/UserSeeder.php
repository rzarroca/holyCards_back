<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

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
            'name' => 'Calima Admin',
            'email' => App::environment(['local', 'development']) === true ? env('DEV_ADMIN_MAIL') : 'dev@calimasolutions.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);
    }
}
