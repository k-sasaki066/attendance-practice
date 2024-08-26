<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use App\Models\Rest;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dummy_date = $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+3 day');
        return [
            'start' => $dummy_date->format('Y-m-d H:i:s'),
            'end' => $dummy_date->modify('+1 hour')->format('Y-m-d H:i:s'),
            'attendance_id' =>$this->faker->numberBetween(1,15)
            ,
        ];
    }
}
