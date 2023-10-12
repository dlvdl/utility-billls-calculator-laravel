<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'currentReadings' => 'required|numeric|min:' . $this->previousReadings,
            'previousReadings' => 'required|numeric|min:0',
            'tariffID' => 'required|exists:tariffs,id',
            'utilization_date' => 'required|date'
        ];
    }
}