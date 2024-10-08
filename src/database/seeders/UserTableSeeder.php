<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
    }
}
