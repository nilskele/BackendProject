<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'], 
            [
                'name' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
            ]
        );
    }
}
