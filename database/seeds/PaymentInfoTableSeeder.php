<?php

use App\PaymentInfo;
use Illuminate\Database\Seeder;

class PaymentInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentInfo::class,1)->create();
    }
}
