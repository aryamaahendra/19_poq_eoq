<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Fulfill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest implements Fulfill
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
        $user = $this->route('m_user');
        return [
            'name' => ['required', 'string', 'max:64'],
            'email' => [
                'required', 'email', 'max:64',
                Rule::unique('users')->ignore($user->id)
            ],
        ];
    }

    public function fulfill(): mixed
    {
        $user = $this->route('m_user');
        return $user->update($this->validated());
    }
}
