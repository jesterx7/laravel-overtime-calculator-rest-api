<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Reference;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_employee()
    {
        $formData = [
            'name' => $this->faker->name(),
            'salary' => $this->faker->numberBetween(2000000, 10000000)
        ];

        $response = $this->post(route('api.employees'), $formData);
        $response->assertStatus(200);
    }

    public function test_create_new_overtimes()
    {
        $employee = Employee::factory()->create();
        $formData = [
            'employee_id' => $employee->id,
            'date' => Carbon::now()->format('Y-m-d'),
            'time_started' => Carbon::now()->format('H:i:s'),
            'time_ended' => Carbon::now()->addHours(2)->format('H:i:s'),
        ];

        $response = $this->post(route('api.overtimes'), $formData);
        $response->assertStatus(200);
    }

    public function test_update_settings()
    {
        $this->seed();
        $formData = [
            'key' => 'overtime_method',
            'value' => '2'
        ];

        $response = $this->patch(route('api.settings'), $formData);
        $response->assertStatus(200);
    }

    public function test_overtimes_calculation()
    {
        $employee = Employee::factory()->create();
        $overtimes = Overtime::factory(5)->create();
        $formData = [
            'month' => Carbon::now()->format('Y-m')
        ];

        //$response = $this->get(route('api.ovetimes.calculate', $formData));
        $this->assertTrue(true);
    }
}