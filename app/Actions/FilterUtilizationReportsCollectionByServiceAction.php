<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilterUtilizationReportsCollectionByServiceAction
{
    public function __invoke($utilizationReportsCollection, $serviceID)
    {
        return $utilizationReportsCollection
            ->where('services.id', $serviceID);
    }
}