<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwCorporativoRequest extends FormRequest
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
            'S_NombreCorto' => 'required|max:45',
            'S_NombreCompleto' => 'required|max:75',
            'S_LogoUrl' => 'max:255|url',
            'S_DBName' => 'required|max:45',
            'S_DBUsuario' => 'required|max:45',
            'S_DBPassword' => 'required|max:45',
            'S_SystemUrl' => 'required|max:255|url',
            'D_FechaIncorporacion' => 'required|date',
            'tw_usuarios_id' => 'required|integer',
        ];
    }
}
