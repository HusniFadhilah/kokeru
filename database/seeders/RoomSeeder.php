<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'R203',
                'slug' => 'r203',
            ],
            [
                'name' => 'R204',
                'slug' => 'r204',
            ],
            [
                'name' => 'R205',
                'slug' => 'r205',
            ],
            [
                'name' => 'R206',
                'slug' => 'r206',
            ]
        ];
        Room::insert($rooms);
    }
}
