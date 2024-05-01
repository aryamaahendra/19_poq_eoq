<?php

namespace App\Http\Requests\Components;

use App\Actions\Components\MeasurementEnum;
use App\Http\Requests\Fulfill;
use App\Models\Component;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

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
            'measurement' => ['required', 'string', 'in:' . Arr::join(MeasurementEnum::all(), ',')],
            'order_cost' => ['required', 'numeric', 'min:1'],
            'holding_cost_unit' => ['required', 'numeric', 'min:1'],
            'lead_time' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function fulfill(): mixed
    {
        return Component::create($this->validated());
    }
}
