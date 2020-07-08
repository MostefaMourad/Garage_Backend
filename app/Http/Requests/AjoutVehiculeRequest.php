<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjoutVehiculeRequest extends FormRequest
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
            'immatriculation' => 'required|string',
            'marque' => 'required|string',
            'couleur' => 'required|string',
            'categorie' => 'required|string',
            'kilometrage' => 'nullable|numeric',
            'image' => 'required|image',    
        ];
    }
}
