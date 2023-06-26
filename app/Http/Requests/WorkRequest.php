<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'text' => 'required|min:20',
        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'Il Titolo è un campo obbligatorio',
            'title.min' => 'Il Titolo deve avere almeno :min caratteri',
            'title.max' => 'Il Titolo non può avere più di :max caratteri',
            'text.required' => 'Il Testo è un campo obbligatorio',
            'text.min' => 'Il Testo deve avere almeno :min caratteri',
        ];
    }
}
