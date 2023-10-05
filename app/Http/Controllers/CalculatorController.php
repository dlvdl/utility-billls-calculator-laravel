<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\CalculateUtilityBillCost;
use App\Actions\MakeUtilizeReport;
use App\Http\Requests\CalculatorRequest;
use App\Http\Resources\UtilizationResource;

class CalculatorController extends Controller
{
    public function calculate(CalculatorRequest $request, CalculateUtilityBillCost $calculateUtilityBillCost, MakeUtilizeReport $makeUtilizeReport)
    {
        $data = $request->validated();
        $calculationResult = $calculateUtilityBillCost($data);
        $utilizeReport = $makeUtilizeReport($calculationResult);
        return new UtilizationResource($utilizeReport);
    }
}