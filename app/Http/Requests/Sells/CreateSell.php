<?php

namespace App\Http\Requests\Sells;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use App\Models\Sell;
use App\Models\SellItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateSell extends FormRequest implements Fulfill
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
            "components" => ['required', 'array', 'min:1'],
            "components.*.unit_price" => ['required', 'numeric', 'min:1'],
            "components.*.qty" => ['required', 'numeric', 'min:1'],
            "components.*.description" => ['required', 'string'],
            "no" => ['required', 'string'],
            "date" => ['required', 'date'],
            "vehicle_number" => ['required', 'string'],
            "driver_name" => ['required', 'string'],
            "company" => ['required', 'string'],
        ];
    }

    public function fulfill(): mixed
    {
        $inputs = $this->validated();
        return DB::transaction(function () use ($inputs) {
            // Create Sell
            $sell = new Sell();
            $sell->forceFill(
                [
                    'no' => $inputs['no'],
                    'vehicle_number' => $inputs['vehicle_number'],
                    'driver_name' => $inputs['driver_name'],
                    'date' => $inputs['date'],
                    'company' => $inputs['company'],
                    'total_item' => count($inputs['components']),
                    'total_price' => 0,
                ]
            )->save();

            $sumPrice = 0;

            // Create oreder item
            foreach ($inputs['components'] as $key => $row) {
                $totalPrice = (int) $row['qty'] * (int) $row['unit_price'];
                $sumPrice += $totalPrice;
                $item = new SellItem();

                // Add component stock
                Component::where('id', $key)
                    ->decrement('in_stock', (int) $row['qty']);

                $item->forceFill(
                    [
                        'sell_id' => $sell->id,
                        'component_id' => $key,
                        'qty' => $row['qty'],
                        'unit_price' => $row['unit_price'],
                        'total_price' => $totalPrice,
                        'description' => $row['description'],
                    ]
                )->save();
            }

            // update order total price
            $sell->total_price = $sumPrice;
            $sell->save();

            return $sell;
        });
    }
}
