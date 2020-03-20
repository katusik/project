<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'       => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'patronymic' => 'required|string|max:50',
            'gender_id'  => 'required',
            'phone'      => 'required|min:10',
            'series'     => 'required|string|max:50',
            'issue'      => 'required|string|max:255',
            'expire'     => 'required'

        ];
    }

    public function messages()
    {
        return [

            'name.required'       => 'Обязательно к заполнению',
            'last_name.required'  => 'Обязательно к заполнению',
            'patronymic.required' => 'Обязательно к заполнению',
            'gender_id.required'  => 'Пол не выбран',
            'phone.min'           => 'Обязательное поле',
            'series.required'     => 'Все поля должны быть заполнены'
        ];
    }
}
