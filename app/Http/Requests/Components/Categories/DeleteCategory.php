<?php

namespace App\Http\Requests\Components\Categories;

use App\Http\Requests\Fulfill;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCategory extends FormRequest implements Fulfill
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
        return [];
    }

    public function fulfill(): mixed
    {
        $category = $this->route('m_category');
        return $category->delete();
    }
}
