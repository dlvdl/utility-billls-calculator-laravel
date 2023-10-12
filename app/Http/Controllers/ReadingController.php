<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\GetPriorUtilizationReadingAction;

class ReadingController extends Controller
{
    public function getLastReading(Request $request, GetPriorUtilizationReadingAction $getPriorUtilizationReadingAction)
    {
        if ($request->has(['tariffID', 'untill'])) {
            return $getPriorUtilizationReadingAction($request->query('tariffID'), $request->query('untill'));
        }
    }
}