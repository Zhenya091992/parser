<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'nameUser' => 'required|unique:users,name|min:4|max:255',
            'emailUser' => 'required|unique:users,email|email',
            'passwordUser' => 'required|min:8|max:255|confirmed'
        ];
    }
}
