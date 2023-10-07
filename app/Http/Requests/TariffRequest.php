<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
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
            "name" => 'string|required|max:255',
            "cost" => 'required|numeric|min:0',
            "service_id" => 'required|numeric|exists:services,id',
            "unit_id" => 'required|numeric|exists:units,id'
        ];
    }
}