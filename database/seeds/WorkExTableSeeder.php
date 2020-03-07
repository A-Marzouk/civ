<?php

use App\WorkEx;
use Illuminate\Database\Seeder;

class WorkExTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WorkEx::class,3)->create();
    }
}
