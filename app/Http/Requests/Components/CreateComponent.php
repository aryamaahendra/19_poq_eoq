<?php

namespace App\Http\Requests\Components;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use Illuminate\Foundation\Http\FormRequest;

class CreateComponent extends FormRequest implements Fulfill
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
            'name' => ['required', 'string', 'max:128'],
            'category_id' => ['required', 'numeric'],
        ];
    }

    public function fulfill(): mixed
    {
        return Component::create($this->validated());
    }
}
