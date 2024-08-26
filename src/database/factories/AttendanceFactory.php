<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Attendance;

class AttendanceFactory extends Factory
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
            // 'date' => $dummyDate->format('Y-m-d'),
            'date' => $dummy_date->format('Y-m-d'),
            // 'start' => $dummyDate->format('Y-m-d H:i:s'),
            'start' => $dummy_date->format('Y-m-d H:i:s'),
            'end' => $dummy_date->modify('+9hour')->format('Y-m-d H:i:s'),
            'user_id' =>$this->faker->numberBetween(1,5)
            ,
        ];
    }
}
