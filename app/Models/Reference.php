<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function settings()
    {
        return $this->hasOne('App\Models\Setting', 'value');
    }
}
