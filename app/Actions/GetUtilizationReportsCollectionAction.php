<?php
namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GetUtilizationReportsCollectionAction
{
    public function __invoke()
    {
        return DB::table('utilization')
            ->select(
                'utilization.id as id',
                'users.name as user_name',
                'utilization.user_id as user_id',
                'tariffs.id',
                'tariffs.name as tarrif_name',
                'services.name as service_name',
                'services.id as service_id',
                'utilization.utilized',
                'readings.previous_readings',
                'readings.current_readings',
                'utilization.cost',
                'utilization.created_at'
            )

            ->join('users', 'utilization.user_id', '=', 'users.id')
            ->join('tariffs', 'tariffs.id', '=', 'utilization.tariff_id')
            ->join('services', 'services.id', '=', 'tariffs.service_id')
            ->join('readings', 'readings.utilization_id', '=', 'utilization.id')
            ->where('utilization.user_id', Auth::id());
    }
}