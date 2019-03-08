<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'lastname' => 'n.v.t',
        	'email' => 'admin@davinci.nl',
        	'classname' => 'n.v.t',
        	'role' => 'admin',
        	'password' => bcrypt('admin!')
        ]);
        DB::table('users')->insert([
            'name' => 'ahmet',
            'lastname' => 'n.v.t',
            'email' => 'ahmet'.'@gmail.com',
            'password' => bcrypt('123456'),
            'classname' => 'n.v.t',
            'role' => 'admin',

        ]);

        factory(App\User::class, 15)->create()->each(function ($user){
        });
    }
}
