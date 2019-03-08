<?php

use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Grade::class, 30)->create()->each(function ($grade){
        });
    }
}