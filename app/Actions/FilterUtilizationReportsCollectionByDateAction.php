<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilterUtilizationReportsCollectionByDateAction
{
    public function __invoke($utilizationReportsCollection, $month, $year)
    {
        if (!$month) {
            $month = date('n');
        }

        if (!$year) {
            $year = date('Y');
        }

        return $utilizationReportsCollection
            ->whereMonth('utilization.created_at', $month)
            ->whereYear('utilization.created_at', $year);
    }
}