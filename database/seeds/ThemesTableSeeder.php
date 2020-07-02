<?php

use App\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::insert([
            [
                'title' => 'Theme 201 - white',
                'category' => 'developer',
                'color'=> 'white',
                'code' => 201,
                'image' => '/images/resume_themes/theme201/preview.png'
            ],
            [
                'title' => 'Theme 3 - white & blue',
                'category' => 'developer',
                'color'=> 'white and blue',
                'code' => 3,
                'image' => '/images/resume_themes/theme3/preview.png'
            ],
            [
                'title' => 'Theme 200 - purple',
                'category' => 'developer',
                'color'=> 'purple',
                'code' => 200,
                'image' => '/images/resume_themes/theme200/preview.png'
            ],
            [
                'title' => 'Theme 8 - black',
                'category' => 'developer',
                'color'=> 'black',
                'code' => 8,
                'image' => '/images/resume_themes/theme8/preview.png'
            ],
            [
                'title' => 'Theme 300 - white and red',
                'category' => 'developer',
                'color'=> 'white and red',
                'code' => 300,
                'image' => '/images/resume_themes/theme300/preview.png'
            ],
            [
                'title' => 'Theme 5 - mixed',
                'category' => 'developer',
                'color'=> 'white and red',
                'code' => 5,
                'image' => '/images/resume_themes/theme300/preview.png'
            ],
            [
                'title' => 'Theme 500 - mixed',
                'category' => 'developer',
                'color'=> 'white and red',
                'code' => 500,
                'image' => '/images/resume_themes/theme300/preview.png'
            ],
        ]);
    }
}
