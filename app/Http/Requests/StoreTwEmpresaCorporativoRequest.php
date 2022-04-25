<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwEmpresaCorporativoRequest extends FormRequest
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
            'S_RazonSocial' => 'required|max:150',
            'S_RFC' => 'required|max:13',
            'S_Pais' => 'max:75',
            'S_Estado' => 'max:75',
            'S_Municipio' => 'max:75',
            'S_ColoniaLocalidad' => 'max:75',
            'S_Domicilio' => 'max:100',
            'S_CodigoPostal' => 'max:5',
            'S_UsoCFDI' => 'max:45',
            'S_UrlRFC' => 'max:255',
            'S_UrlActaConstitutiva' => 'max:75|url',
            'S_Activo' => 'required|integer',
            'S_Comentarios' => 'max:255',
            'tw_corporativos_id' => 'required|integer',
        ];
    }
}
