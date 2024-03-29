<?php

namespace App\Http\Requests\Components\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends CreateCategory
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fulfill(): mixed
    {
        $category = $this->route('m_category');
        return $category->update($this->validated());
    }
}
