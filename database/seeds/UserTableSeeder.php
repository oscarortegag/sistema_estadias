<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role_alumno = Role::where('name', 'alumno')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
        /*$user = new User();
        $user->name = 'Alumno';
        $user->email = 'alumno@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_alumno);*/
    }
}
