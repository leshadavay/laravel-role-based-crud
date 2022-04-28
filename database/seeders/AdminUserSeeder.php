<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'  =>  'Administrator',
            'email' =>  'admin@admin.com',
            'password' =>  bcrypt(User::ADMIN_DEFAULT_PASSWORD),
            'role_id' =>  1,
        ]);
    }
}
