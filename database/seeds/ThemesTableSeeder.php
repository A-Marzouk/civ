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
                'title' => 'Theme 1001',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 1001,
                'is_active' => 1,
                'image' => '/images/resume_themes/theme1001/preview.png'
            ],
            [
                'title' => 'Theme 511',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 511,
                'is_active' => 0,
                'image' => '/images/resume_themes/theme511/preview.png'
            ],
            [
                'title' => 'Theme 206',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 206,
                'is_active' => 0,
                'image' => '/images/resume_themes/theme206/preview.png'
            ],
            [
                'title' => 'Theme 501',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 501,
                'is_active' => 0,
                'image' => '/images/resume_themes/theme501/preview.png'
            ],
            [
                'title' => 'Theme 502',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 502,
                'is_active' => 0,
                'image' => '/images/resume_themes/theme502/preview.png'
            ],
            [
                'title' => 'Theme 203',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 203,
                'is_active' => 1,
                'image' => '/images/resume_themes/theme203/preview.png'
            ],
            [
                'title' => 'Theme 5',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 5,
                'is_active' => 1,
                'image' => '/images/resume_themes/theme5/preview.png'
            ],
            [
                'title' => 'Theme 8',
                'category' => 'new',
                'color'=> 'mixed',
                'code' => 8,
                'is_active' => 0,
                'image' => '/images/resume_themes/theme8/preview.png'
            ],
        ]);
    }
}
