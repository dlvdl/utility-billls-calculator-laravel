<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilization;
use App\Http\Resources\UtilizationResource;
use Illuminate\Support\Facades\Auth;

class UtilizationController extends Controller
{
    function index(Request $request, Utilization $utilization)
    {
        return UtilizationResource::collection($utilization::where('user_id', Auth::id())->get());
    }
    //TODO finsh filtering route
    function show(Request $request, $service = null, $order = 'asc')
    {
        return $service . "|||" . $order;
    }
}