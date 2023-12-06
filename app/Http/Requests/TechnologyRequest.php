<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'version' => 'nullable|numeric',
            'description' => 'required|min:5',
            'date_updated' => 'required|date',
        ];
    }

    public function messages()
    {
        return[
            "name.required" => "Il nome della tecnologia è obbligatorio",
            "name.min" => "Il nome della tecnologia non deve essere minore di :min caratteri",
            "name.max" => "Il nome della tecnologia non deve essere maggiore di :min caratteri",
            "version.numeric" => "Il numero della versione deve essere numerica",
            "description.required" => "La descrizione è obbligatoria",
            "description.min" => "La descrizione non deve essere minore di :min caratteri",
            "date_updated.required" => "La data dell'ultima modifica è obbligatoria",
            "date_updated.date" => "La data dell'ultima modifica deve essere una data YYYY-MM-DD",
        ];
    }
}
