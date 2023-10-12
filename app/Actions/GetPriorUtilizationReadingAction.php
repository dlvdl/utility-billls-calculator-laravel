<?php

namespace App\Actions;

use App\Models\Utilization;
use Illuminate\Support\Facades\DB;

class GetPriorUtilizationReadingAction
{
    public function __invoke($tariffID, $month, $year)
    {
        $reading = DB::table('utilization')
            ->join('tariffs', 'tariffs.id', '=', 'utilization.tariff_id')
            ->join('readings', 'readings.utilization_id', '=', 'utilization.id')
            ->where('tariffs.id', $tariffID)
            ->whereMonth('utilization.utilization_time', '<=', $month)
            ->whereYear('utilization.utilization_time', '<=', $year)
            ->orderBy('utilization.utilization_time', 'desc')
            ->orderBy('utilization.created_at', 'desc')
            ->limit(1)
            ->value('readings.current_readings');
        return $reading;
    }
}