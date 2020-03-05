<?php


use App\PersonalInfo;
use Illuminate\Database\Seeder;

class PersonalInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PersonalInfo::class,1)->create();
    }
}
