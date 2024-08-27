<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++) {
            Seat::create([
                'seat_number' => 'A' . $i,
                'is_booked' => false
            ]);
        }
    }
}
