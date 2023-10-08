<?php

namespace App\Actions;

use App\Models\Utilization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Reading;

class MakeUtilizeReportAction
{
    private $utilization;
    private $reading;
    private $user;
    public function __construct(Utilization $utilization, User $user, Reading $reading)
    {
        $this->utilization = $utilization;
        $this->reading = $reading;
        $this->user = $user;
    }

    public function __invoke($calculationResult)
    {
        [
            'tariffID' => $tariffID,
            'price' => $price,
            'utilized' => $utilized,
            'previousReadings' => $previousReadings,
            'currentReadings' => $currentReadings
        ] = $calculationResult;

        $report = $this->utilization::create(['user_id' => Auth::user()->id, 'tariff_id' => $tariffID, 'utilized' => $utilized, 'cost' => $price]);
        $this->reading::create([
            'previous_readings' => $previousReadings,
            'current_readings' => $currentReadings,
            'utilization_id' => $report->id
        ]);
        return $report;
    }
}