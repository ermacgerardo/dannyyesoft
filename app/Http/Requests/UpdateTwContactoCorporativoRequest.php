<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwContactoCorporativoRequest extends FormRequest
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
            'S_Nombre' => 'required|max:45',
            'S_Puesto' => 'required|max:45',
            'S_Comentarios' => 'max:255',
            'S_TelefonoFijo' => 'max:12',
            'S_TelefonoMovil' => 'max:42',
            'S_Email' => 'required|max:45',
            'tw_corporativos_id' => 'required|integer',
        ];
    }
}
