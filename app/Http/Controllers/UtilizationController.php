<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilization;
use App\Http\Resources\UtilizationResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class UtilizationController extends Controller
{
    function index(Request $request, Utilization $utilization)
    {
        return UtilizationResource::collection($utilization::where('user_id', Auth::id())->get());
    }
    //TODO finsh filtering route
    function show(Request $request, $serviceID = null, Utilization $utilization, Service $service)
    {
        $result = $utilization::where('user_id', Auth::id());

        if ($serviceID && $service::find($serviceID)) {
            return UtilizationResource::collection($result->where('service_id', $serviceID));
        }

        return UtilizationResource::collection($result);
    }
}