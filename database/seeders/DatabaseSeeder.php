<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
