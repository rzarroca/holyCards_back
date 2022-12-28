<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HolyCardReservation>
 */
class HolyCardReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'holy_card_id' => rand(1, 2),
            'user_id' => rand(2, 4),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(rand(1, 5))
        ];
    }

    /**
     * Indicate that the model's reservations days will be made in the future
     * 
     * @param  int $days
     * @return static
     */
    public function add(int $days)
    {
        return $this->state(fn () => [
            'start_date' => Carbon::now()->addDays($days),
            'end_date' => Carbon::now()->addDays($days + rand(1, 5))
        ]);
    }

    /**
     * Indicate that the model's reservations days will be made in the past
     * 
     * @param  int $days
     * @return static
     */
    public function substract(int $days)
    {
        return $this->state(fn () => [
            'start_date' => Carbon::now()->subDays($days + rand(1, 5)),
            'end_date' => Carbon::now()->subDays($days)
        ]);
    }
}
