<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilterUtilizationReportsCollectionByDateAction
{
    public function __invoke($utilizationReportsCollection, $start, $end)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $start);
        $end_date = Carbon::createFromFormat('Y-m-d', $end);

        return $utilizationReportsCollection
            ->where('utilization.utilization_time', '>=', $start_date)
            ->where('utilization.utilization_time', '<=', $end_date);
    }
}