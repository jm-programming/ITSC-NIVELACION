<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Languages_quotes_Request extends FormRequest
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
            'names' => 'required',
            'last_name' => 'required',
            'matricula' => 'required',
            'career' => 'required',
            'birthday' => 'required',
            'identity_card' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
        ];
    }
}
