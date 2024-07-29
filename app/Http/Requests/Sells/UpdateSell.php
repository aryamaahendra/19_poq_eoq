<?php

namespace App\Http\Requests\Sells;

use App\Models\Component;
use App\Models\SellItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateSell extends CreateSell
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
        $inputs = $this->validated();
        $sell = $this->route('m_sell');
        $sell->load('items');

        return DB::transaction(function () use ($inputs, $sell) {
            // Update Order
            $sell->forceFill(
                [
                    // 'no' => $inputs['no'],
                    'vehicle_number' => $inputs['vehicle_number'],
                    'driver_name' => $inputs['driver_name'],
                    'date' => $inputs['date'],
                    'company' => $inputs['company'],
                    'total_item' => count($inputs['components']),
                    'total_price' => 0,
                ]
            )->save();

            $sumPrice = 0;
            $exist = [];

            // Update oreder item
            foreach ($sell->items as $item) {
                // Check if items exist if yes update data else delete item
                if (Arr::exists($inputs['components'], $item->component_id)) {
                    $key = $item->component_id;
                    array_push($exist, $key);

                    $qty = (int) $inputs['components'][$key]['qty'];
                    $unit_price = 0;
                    $totalPrice = $qty * $unit_price;
                    $sumPrice += $totalPrice;

                    if ($qty != $item->qty) {
                        Component::where('id', $item->component_id)
                            ->increment('in_stock', (int) $item->qty - $qty);
                    }

                    $item->forceFill(
                        [
                            'qty' => $inputs['components'][$key]['qty'],
                            // 'unit_price' => $inputs['components'][$key]['unit_price'],
                            'total_price' => $totalPrice,
                            'description' => $inputs['components'][$key]['description'],
                        ]
                    )->save();
                } else {
                    Component::where('id', $item->component_id)
                        ->increment('in_stock', (int) $item->qty);

                    $item->delete();
                }
            }

            foreach ($inputs['components'] as $key => $row) {
                if (in_array($key, $exist)) continue;

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
