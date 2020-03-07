<?php

use Illuminate\Database\Seeder;
use App\Summary;

class SummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Summary::class,10)->create();
    }
}
