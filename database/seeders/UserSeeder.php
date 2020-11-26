<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supervisor = [
            [
                'role_id' => 1,
                'name' => 'Alissa Nida Afifah',
                'email' => 'alissa@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'alissa-nida-afifah',
                'password' => bcrypt('secret'),
            ],
            [
                'role_id' => 1,
                'name' => 'Husni Fadhilah Dhiya Ul Haq',
                'email' => 'husni@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'husni-fadhilah-dhiya-ul-haq',
                'password' => bcrypt('secret'),
            ],
            [
                'role_id' => 1,
                'name' => 'Muhammad Rizqi Arya Pradana',
                'email' => 'rizqi@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'muhammad-rizqi-arya-pradana',
                'password' => bcrypt('secret'),
            ],
            [
                'role_id' => 1,
                'name' => 'Safira Rahma Dewi',
                'email' => 'safira@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'safira-rahma-dewi',
                'password' => bcrypt('secret'),
            ]
        ];
        User::insert($supervisor);

        $cs = [
            [
                'role_id' => 2,
                'name' => 'Doni Kurnia',
                'email' => 'doni@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'doni-kurnia',
                'password' => bcrypt('secret'),
            ],
            [
                'role_id' => 2,
                'name' => 'Dewi Astuti',
                'email' => 'dewi@gmail.com',
                'avatar' => 'assets/img/user/default.jpg',
                'slug' => 'dewi-astuti',
                'password' => bcrypt('secret'),
            ],
        ];
        User::insert($cs);
    }
}
