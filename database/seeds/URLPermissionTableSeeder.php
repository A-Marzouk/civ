<?php

use App\URLPermission;
use Illuminate\Database\Seeder;

class URLPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        URLPermission::insert([
            [
                'name' => 'owner',
                'label' => 'Has full access to the resume builder including account settings'
            ],
            [
                'name' => 'editor',
                'label' => 'Has full access to the edit and theme tab.'
            ],
            [
                'name' => 'viewer',
                'label' => 'Can view the resume builder tabs.'
            ]
        ]);
    }
}
