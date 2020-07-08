<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjoutEtatVehiculeRequest extends FormRequest
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
            'immatriculation' => 'required|string|exists:vehicules,immatriculation',
            'date' => 'required|date',
            'nomre_chang_pneu' => 'required|integer',
            'nombre_maintenance' => 'required|integer',
            'kilometrage' => 'required|numeric',
            'etat_batterie' => 'required|digits_between:0,100',
        ];
    }
}
