<?php

use Illuminate\Database\Seeder;

class ProjectImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProjectImage::class,5)->create();
    }
}
