<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'employee_id', 'date', 'time_started', 'time_ended'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Models\Employee', 'id');
    }
}
