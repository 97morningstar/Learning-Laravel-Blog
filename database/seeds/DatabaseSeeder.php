<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();


        $user = User::create([
        	'name' => 'Elisa',
        	'email' => 'admin@admin.com',
        	'password' => '123123'
        ]);

        $role = Role::create([
        	'name' => 'admin',
        	'display_name' => 'Administrador',
        	'description' => 'Adminitrador del sitio'
         ]);

        $user->roles()->save($role);


    }
}
