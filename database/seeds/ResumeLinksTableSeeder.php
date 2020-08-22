<?php

use App\ResumeLink;
use Illuminate\Database\Seeder;

class ResumeLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ResumeLink::class,3)->create();

    }
}
