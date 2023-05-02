<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3']
        ];
    }

    /**
     * Se você quer personalizar as mensagens basta implementar a função 'messages'.
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => "O campo 'Nome' é obrigatório.",
            'name.min' => "Deve informar ao menos :min caracteres no campo 'Nome'."
        ];
    }
}
