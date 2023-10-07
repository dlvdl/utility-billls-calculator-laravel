<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilization;
use App\Http\Resources\UtilizationResource;

class UtilizationController extends Controller
{
    function index(Request $request, Utilization $utilization)
    {
        return UtilizationResource::collection($utilization::all());
    }
}