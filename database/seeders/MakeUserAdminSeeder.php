<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class MakeUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make user with ID 3 an admin
        $user = User::find(3);
        $user->is_admin = true;
        $user->save();
    }
}
