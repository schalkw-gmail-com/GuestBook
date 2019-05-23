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
            'password' => bcrypt('admin')
        ]);

        $user->setRoles([\App\UserRole::ROLE_ADMIN]);
        $user->save();

        $user = User::create([
            'name' => "Piet",
            'email' =>'piet@piet.com',
            'password' => bcrypt('piet')
        ]);

        $user->setRoles([\App\UserRole::ROLE_USER]);
        $user->save();

        $user = User::create([
            'name' => "Jan",
            'email' =>'jan@jan.com',
            'password' => bcrypt('jan')
        ]);

        $user->setRoles([\App\UserRole::ROLE_USER]);
        $user->save();
    }
}
