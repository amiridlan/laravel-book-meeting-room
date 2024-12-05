<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            'Dewan Mesyuarat',
            'Gerakan',
            'Seroja',
            'Bunga Tanjung',
            'Bakawali',
            'Ixora',
            'Tekoma',
            'Orkid',
            'Anggerik',
            'Bunga Raya',
        ];

        foreach ($rooms as $room) {
            Room::create(['name' => $room]);
        }
    }
}
