<?php

namespace App\Http\Requests\Auth\LoginController;

use App\Models\User;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                function(string $attribute, mixed $value, Closure $fail): void {
                    $user = User::where('email', $this->email);
                    if(!$user->exists() || !Hash::check($value, $user->pluck('password')->first())){
                        $fail('Неверный Email или пароль');
                    }
                }
            ],
            'remember' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Введите email',
            'email.email' => 'Неверный формат email',

            'password.required' => 'Введите пароль',
            'password.string' => 'Пароль должен быть строкой'
        ];
    }
}
