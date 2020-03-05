<?php

use App\Import;
use Illuminate\Database\Seeder;

class ImportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Import::class,10)->create();
    }
}
