<?php

namespace App\Http\Controllers;

class HealthCheckController extends Controller
{
    public function healthCheck()
    {
        return response()->json([
            'status' => true,
            'version' => '9.20.0'
        ]);
    }
}
