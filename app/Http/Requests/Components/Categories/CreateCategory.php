<?php

namespace App\Http\Requests\Components\Categories;

use App\Http\Requests\Fulfill;
use App\Models\ComponentCategory;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest implements Fulfill
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
            'name' => ['required', 'string', 'max:34']
        ];
    }

    public function fulfill(): mixed
    {
        return ComponentCategory::create($this->validated());
    }
}
