<?php

namespace Database\Seeders;

use App\Models\HolyCardReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolyCardReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addDays = 0;
        $subDays = 0;

        HolyCardReservation::factory()->count(1)->create();

        for ($i = 0; $i < 5; $i++) {
            $addDays += rand(6, 10);
            HolyCardReservation::factory()->count(1)->add($addDays)->create();
        }

        for ($i = 0; $i < 5; $i++) {
            $subDays += rand(6, 10);
            HolyCardReservation::factory()->count(1)->substract($subDays)->create();
        }
    }
}
