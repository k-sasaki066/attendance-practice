<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\attendance;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::factory()->count(15)->create();
    }
}
