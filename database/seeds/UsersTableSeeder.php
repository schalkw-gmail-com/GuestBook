<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Admin",
            'email' =>'admin@admin.com',
            'password' => 'admin'
        ]);

        $user->setRoles([\App\UserRole::ROLE_ADMIN]);
        $user->save();

        $user = User::create([
            'name' => "Piet",
            'email' =>'piet@admin.com',
            'password' => 'piet'
        ]);

        $user->setRoles([\App\UserRole::ROLE_USER]);
        $user->save();
    }
}
