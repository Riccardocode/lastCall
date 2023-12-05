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
                'phonenumber' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Luiza',
                'lastname' => 'lastCall',
                'email' => 'lu@lastcall.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Brandon',
                'lastname' => 'lastCall',
                'email' => 'bran@lastcall.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Antoine',
                'lastname' => 'lastCall',
                'email' => 'ant@lastcall.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Dany',
                'lastname' => 'lastCall',
                'email' => 'dan@lastcall.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'admin',
            ],
            [
                'firstname' => 'Alfio',
                'lastname' => 'Marconi',
                'email' => 'alfio@pizzahut.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'restaurantManager',
            ],
            [
                'firstname' => 'Mario',
                'lastname' => 'Marconi',
                'email' => 'mario@specialpizza.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'restaurantManager',
            ],
            [
                'firstname' => 'Betty',
                'lastname' => 'bettoni',
                'email' => 'betty@crazycake.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'restaurantManager',
            ],
            [
                'firstname' => 'Kelly',
                'lastname' => 'kelloni',
                'email' => 'kario@anguillasushi.lu',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'restaurantManager',
            ],
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '5555555555',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Alice',
                'lastname' => 'Smith',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '6666666666',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Michael',
                'lastname' => 'Johnson',
                'email' => 'michael@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '7777777777',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Sarah',
                'lastname' => 'Wilson',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '8888888888',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'David',
                'lastname' => 'Brown',
                'email' => 'david@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '9999999999',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Emily',
                'lastname' => 'Lee',
                'email' => 'emily@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '1111111111',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'James',
                'lastname' => 'Wilson',
                'email' => 'james@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '2222222222',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Olivia',
                'lastname' => 'Smith',
                'email' => 'olivia@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '3333333333',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Daniel',
                'lastname' => 'Davis',
                'email' => 'daniel@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '4444444444',
                'role' => 'restaurantManager',
            ],
            
            [
                'firstname' => 'Sophia',
                'lastname' => 'Miller',
                'email' => 'sophia@example.com',
                'password' => Hash::make('password'),
                'phonenumber' => '5555555555',
                'role' => 'restaurantManager',
            ],
            
            

        ]);
    }
}
