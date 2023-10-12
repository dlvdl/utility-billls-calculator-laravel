<?php

namespace App\Actions;

use App\Models\Utilization;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GetPriorUtilizationReadingAction
{
    public function __invoke($tariffID, $untill)
    {
        $untill_date = Carbon::createFromFormat('Y-m-d', $untill);
        $reading = DB::table('utilization')
            ->join('tariffs', 'tariffs.id', '=', 'utilization.tariff_id')
            ->join('readings', 'readings.utilization_id', '=', 'utilization.id')
            ->where('tariffs.id', $tariffID)
            ->where('utilization.utilization_time', '<=', $untill_date)
            ->orderBy('utilization.utilization_time', 'desc')
            ->orderBy('utilization.created_at', 'desc')
            ->limit(1)
            ->value('readings.current_readings');
        return ['prev_reading' => $reading];
    }
}