<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanningRequest extends FormRequest
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
            'date' => 'nullable|date',
            'region' => 'nullable|string',
            'adresse' => 'nullable|string', 
            'nom_panne' => 'nullable|string', 
            'type_panne' => 'nullable|string', 
            'description_panne' => 'nullable|string'
        ];
    }
}
