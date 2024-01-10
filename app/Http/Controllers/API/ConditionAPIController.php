<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Condition;

class ConditionAPIController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();

        return response()->json($conditions, 200);
    }
}
