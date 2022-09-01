<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Employee;

class OvertimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::first()->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'time_started' => Carbon::now()->format('H:i:s'),
            'time_ended' => Carbon::now()->addHours(2)->format('H:i:s'),
        ];
    }
}
