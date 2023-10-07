<?php

namespace App\Actions;

use App\Models\Tariff;

class UpdateTariffAction
{
    private $tariff;

    public function __construct(Tariff $tariff)
    {
        $this->tariff = $tariff;
    }

    public function __invoke($id, $data)
    {
        $this->tariff::where('id', $id)->update($data);
        return $this->tariff::where('id', $id)->first();
    }
}