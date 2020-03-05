<?php

use Illuminate\Database\Seeder;
use App\Media;
class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Media::class,4)->create();
    }
}
