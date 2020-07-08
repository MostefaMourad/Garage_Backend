<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEtatVehiculeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomre_chang_pneu' => 'nullable|integer',
            'nombre_maintenance' => 'nullable|integer',
            'kilometrage' => 'nullable|numeric',
            'etat_batterie' => 'nullable|digits_between:0,100',
        ];
    }
}
