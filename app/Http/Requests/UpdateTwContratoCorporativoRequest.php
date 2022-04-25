<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwContratoCorporativoRequest extends FormRequest
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
            'D_FechaIncorporacion' => 'required|date',
            'D_FechaFin' => 'required|date',
            'S_URLContrato' => 'max:255|url',
            'tw_corporativos_id' => 'required|integer',
        ];
    }
}
