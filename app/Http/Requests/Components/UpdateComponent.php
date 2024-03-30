<?php

namespace App\Http\Requests\Components;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComponent extends CreateComponent
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
        $component = $this->route('m_component');
        return $component->update($this->validated());
    }
}
