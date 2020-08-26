<?php

use App\Promocode;
use Illuminate\Database\Seeder;

class PromocodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Promocode::class,3)->create();
    }
}
