<?php

use App\Hobby;
use Illuminate\Database\Seeder;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hobby::class,10)->create();
    }
}
