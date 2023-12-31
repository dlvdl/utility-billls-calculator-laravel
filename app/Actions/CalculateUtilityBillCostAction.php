<?php
namespace App\Actions;

use App\Models\Tariff;

class CalculateUtilityBillCostAction
{
    private $tariff;

    public function __construct(Tariff $tariff)
    {
        $this->tariff = $tariff;
    }

    public function __invoke($data)
    {
        [
            'previousReadings' => $previousReadings,
            'currentReadings' => $currentReadings,
            'tariffID' => $tariffID,
            'utilization_date' => $utilization_date
        ] = $data;

        $currentTariff = $this->tariff::where('id', $tariffID)->first();
        $utilized = $currentReadings - $previousReadings;
        $price = round($utilized * $currentTariff->cost);

        return [
            'tariffID' => $tariffID,
            'price' => $price,
            'utilized' => $utilized,
            'previousReadings' => $previousReadings,
            'currentReadings' => $currentReadings,
            'utilization_date' => $utilization_date
        ];
    }
}