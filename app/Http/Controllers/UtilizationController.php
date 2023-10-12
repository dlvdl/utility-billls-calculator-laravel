<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilization;
use App\Http\Resources\UtilizationResource;
use Illuminate\Support\Facades\Auth;
use App\Actions\FilterUtilizationReportsCollectionByDateAction;
use App\Actions\FilterUtilizationReportsCollectionByServiceAction;
use App\Actions\GetUtilizationReportsCollectionAction;

class UtilizationController extends Controller
{
    function index(Request $request, GetUtilizationReportsCollectionAction $getUtilizationReportsCollectionAction, FilterUtilizationReportsCollectionByDateAction $filterUtilizationReportsCollectionByDateAction)
    {
        $utilityReportsCollection = $getUtilizationReportsCollectionAction();
        if ($request->has(['start', 'end'])) {
            return $filterUtilizationReportsCollectionByDateAction($utilityReportsCollection, $request->query('start'), $request->query('end'))->get();
        }

        return $utilityReportsCollection->get();
    }

    function show(
        Request $request,
        string $serviceID,
        FilterUtilizationReportsCollectionByDateAction $filterUtilizationReportsCollectionByDateAction,
        GetUtilizationReportsCollectionAction $getUtilizationReportsCollectionAction,
        FilterUtilizationReportsCollectionByServiceAction $filterUtilizationReportsCollectionByServiceAction
    ) {
        $utilityReportsCollection = $getUtilizationReportsCollectionAction();
        $utilityReportsCollection = $filterUtilizationReportsCollectionByServiceAction($utilityReportsCollection, $serviceID);
        if ($request->has(['start', 'end'])) {
            return $filterUtilizationReportsCollectionByDateAction($utilityReportsCollection, $request->query('start'), $request->query('end'))->get();
        }

        return $utilityReportsCollection->get();
    }
}