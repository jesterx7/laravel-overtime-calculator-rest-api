<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class ErrorController extends Controller
{
    public function show()
    {
        return ApiFormatter::formatApi(400, 'Request Error', []);
    }
}
