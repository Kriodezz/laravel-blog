<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'введите имя',
            'name.string' => 'недопустимое имя',
            'email.required' => 'укажите адрес электронной почты',
            'email.email' => 'неверный формат адреса электронной почты',
            'email.unique' => 'указанный email уже существует',
            'role.required' => 'выберите роль',
            'role.integer' => 'недопустимая роль',
        ];
    }
}
