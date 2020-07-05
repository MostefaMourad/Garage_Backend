<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjoutPlanningRequest extends FormRequest
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
            'date' => 'required|date',
            'region' => 'required|string',
            'adresse' => 'required|string', 
            'nom_panne' => 'required|string', 
            'type_panne' => 'required|string', 
            'description_panne' => 'required|string', 
            'vehicule_id' => 'required|integer|exists:vehicules,id',
        ];
    }
}
