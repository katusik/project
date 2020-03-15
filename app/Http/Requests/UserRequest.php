<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'avatar'    => 'mimes:jpg,jpeg,png',
            'name'      => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email'     => 'required|email:rfc,dns',
            'gender_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes'       => 'Тип файла: jpg, jpeg, png',
            'name.required'      => 'Обязательно к заполнению',
            'email.required'     => 'Обязательно к заполнению',
            'email.email'        => 'Введите корректный email',
            'last_name.required' => 'Обязательно к заполнению',
            'gender_id.required' => 'Пол не выбран',
        ];
    }


}
