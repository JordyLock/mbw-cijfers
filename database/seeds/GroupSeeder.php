<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Group::class, 5)->create()->each(function ($group){
        });
    }
}