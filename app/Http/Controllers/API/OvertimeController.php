<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOvertimeRequest;
use App\Http\Requests\GetOvertimeCalculationRequest;
use App\Models\Overtime;
use App\Models\Employee;
use App\Models\Reference;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOvertimeRequest $request)
    {
        $validated = $request->validated();
        $overtime = Overtime::create($request->all());
        
        return ApiFormatter::formatApi(200, 'Store Success', $overtime);
    }

    public function show(GetOvertimeCalculationRequest $request)
    {
        $validated = $request->validated();
        
        $date = explode("-", $request->get('month'));
        $reference = Reference::has('settings')->first();
        
        $year = $date[0];
        $month = $date[1];
        
        $employees = Employee::whereHas('overtimes', function($query) use ($year, $month) {
            $query->whereYear('date', '=', $year)->whereMonth('date', '=', $month);
        })->get();
        
        foreach ($employees as $employee) {
            $employee->overtimes = $employee->overtimes;
            $totalDuration = 0;
            foreach ($employee->overtimes as $overtime) {
                $duration = floor((strtotime($overtime->time_ended) - strtotime($overtime->time_started))/3600);
                $totalDuration += $duration;
                $overtime->overtime_duration = $duration;
            }

            $employee->overtime_duration_total = $totalDuration;
            $amount = str_replace('salary', $employee->salary, $reference->expression);
            $amount = str_replace('overtime_duration_total', $employee->overtime_duration_total, $amount);
            $amount = floor(eval('return '. $amount. ';'));
            $employee->amout = $amount;
        }

        return ApiFormatter::formatApi(200, 'Grab Success', $employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
