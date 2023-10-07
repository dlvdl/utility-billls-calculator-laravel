<?php

namespace App\Actions;

use App\Models\Utilization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MakeUtilizeReportAction
{
    private $utilization;
    private $user;
    public function __construct(Utilization $utilization, User $user)
    {
        $this->utilization = $utilization;
        $this->user = $user;
    }

    public function __invoke($calculationResult)
    {
        ['tariffID' => $tariffID, 'price' => $price, 'utilized' => $utilized] = $calculationResult;
        return $this->utilization::create(['user_id' => Auth::user()->id, 'tariff_id' => $tariffID, 'utilized' => $utilized, 'cost' => $price]);
    }
}