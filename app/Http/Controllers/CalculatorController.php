<?php

namespace App\Http\Controllers;

use App\Actions\CalculateUtilityBillCostAction;
use App\Actions\MakeUtilizeReportAction;
use App\Http\Requests\CalculatorRequest;
use App\Http\Resources\UtilizationResource;

class CalculatorController extends Controller
{
    public function calculate(CalculatorRequest $request, CalculateUtilityBillCostAction $calculateUtilityBillCost, MakeUtilizeReportAction $makeUtilizeReport)
    {
        $data = $request->validated();
        $calculationResult = $calculateUtilityBillCost($data);
        $utilizeReport = $makeUtilizeReport($calculationResult);
        return new UtilizationResource($utilizeReport);
    }
}