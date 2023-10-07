<?php

namespace App\Actions;

use App\Models\Tariff;

class CreateTariffAction
{
    private $tariff;

    public function __construct(Tariff $tariff)
    {
        $this->tariff = $tariff;
    }

    public function __invoke($data)
    {
        return $this->tariff::query()->create($data);
    }
}