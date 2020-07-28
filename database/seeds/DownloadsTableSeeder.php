<?php

use Illuminate\Database\Seeder;
use App\Download;

class DownloadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Download::class,3)->create();
    }
}
