<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Riccardo',
                'lastname' => 'lastCall',
                'email' => 'ric@lastcall.lu',
                'password' => Hash::make('password'),
                'phone' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Luiza',
                'lastname' => 'lastCall',
                'email' => 'lu@lastcall.lu',
                'password' => Hash::make('password'),
                'phone' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Brandon',
                'lastname' => 'lastCall',
                'email' => 'bran@lastcall.lu',
                'password' => Hash::make('password'),
                'phone' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Antoine',
                'lastname' => 'lastCall',
                'email' => 'ant@lastcall.lu',
                'password' => Hash::make('password'),
                'phone' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Dany',
                'lastname' => 'lastCall',
                'email' => 'dan@lastcall.lu',
                'password' => Hash::make('password'),
                'phone' => '3333333333',
                'role' => 'admin',
            ],

        ]);
    }
}
