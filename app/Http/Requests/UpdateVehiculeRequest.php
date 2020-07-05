<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehiculeRequest extends FormRequest
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
            
            'immatriculation' => 'nullable|string',
            'marque' => 'nullable|string',
            'couleur' => 'nullable|string',
            'categorie' => 'nullable|string',
            'kilometrage' => 'nullable|numeric', 
        ];
    }
}
