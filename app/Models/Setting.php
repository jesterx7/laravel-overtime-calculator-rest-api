<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = null;
    protected $fillable = [
        'key', 'value'
    ];

    public function references()
    {
        return $this->belongsTo('App\Models\Reference', 'id');
    }
}
