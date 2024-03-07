<?php

namespace App\Http\Requests\ResetController;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required|string',
            'password' => 'required|string|min:8',
            're_password' => [
                'required',
                'string',
                function(string $attribute, mixed $value, Closure $fail): void{
                    if($this->password != $value){
                        $fail('Пароли не совпадают');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'Ошибка',
            'token.string' => 'Ошибка',

            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой',
            'password.min' => 'Пароль должен содержать не менее 8 символов',

            're_password.required' => 'Повторите пароль',
            're_password.string' => 'Повторный пароль должен быть строкой'
        ];
    }
}
