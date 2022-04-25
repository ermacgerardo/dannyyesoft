<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwDocumentoCorporativoRequest extends FormRequest
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
            'tw_corporativos_id' => 'required|integer',
            'tw_documentos_id' => 'required|integer',
            'S_ArchivoUrl' => 'max:255|url',
        ];
    }
}
