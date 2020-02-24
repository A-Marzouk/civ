<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'email' => 'admin@civ.ie',
                'password' => Hash::make('administrator'),
                'username' => 'admin',
                'name' => 'Administrator'
            ],
        ])->each(function ($item) {
            User::create($item)->assignRole('admin');
        });

        collect([
            [
                'email' => 'agent@civ.ie',
                'password' =>  Hash::make('123456789'),
                'username' => 'agent',
                'name' => 'Civ Agent',
            ],
        ])->each(function ($item) {
            User::create($item)->assignRole('agent');
        });
    }
}
