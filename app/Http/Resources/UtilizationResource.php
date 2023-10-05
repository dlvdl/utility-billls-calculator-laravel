<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user->name,
            'user_id' => $this->user->id,
            'tariff_name' => $this->tariff->name,
            'tariff_id' => $this->tariff->id,
            'utilized' => $this->utilized,
            'cost' => $this->cost
        ];
    }
}