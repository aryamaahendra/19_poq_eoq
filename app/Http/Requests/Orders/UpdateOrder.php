<?php

namespace App\Http\Requests\Orders;

use App\Models\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UpdateOrder extends CreateOrder
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
        $order = $this->route('m_order');
        $order->load('items');

        return DB::transaction(function () use ($inputs, $order) {
            // Update Order
            $order->forceFill(
                [
                    'no' => $inputs['no'],
                    'from' => $inputs['from'],
                    'at' => $inputs['at'],
                    'date' => $inputs['date'],
                    'total_item' => count($inputs['components']),
                    'total_price' => 0,
                ]
            )->save();

            $sumPrice = 0;
            $exist = [];

            // Update oreder item
            foreach ($order->items as $item) {
                // Check if items exist if yes update data else delete item
                if (Arr::exists($inputs['components'], $item->component_id)) {
                    $key = $item->component_id;
                    array_push($exist, $key);

                    $qty = (int) $inputs['components'][$key]['qty'];
                    $unit_price = (int) $inputs['components'][$key]['unit_price'];
                    $totalPrice = $qty * $unit_price;
                    $sumPrice += $totalPrice;

                    if ($order->status == 'success') {
                        Component::where('id', $item->component_id)
                            ->decrement('in_stock', (int) $item->qty - $qty);
                    }

                    $item->forceFill(
                        [
                            'qty' => $inputs['components'][$key]['qty'],
                            'unit_price' => $inputs['components'][$key]['unit_price'],
                            'total_price' => $totalPrice,
                            'vehicle_number' => $inputs['components'][$key]['vehicle_number'],
                            'description' => $inputs['components'][$key]['description'],
                        ]
                    )->save();
                } else {
                    if ($order->status == 'success') {
                        Component::where('id', $item->component_id)
                            ->decrement('in_stock', (int) $item->qty);
                    }

                    $item->delete();
                }
            }

            foreach ($inputs['components'] as $key => $row) {
                if (in_array($key, $exist)) continue;

                $totalPrice = (int) $row['qty'] * (int) $row['unit_price'];
                $sumPrice += $totalPrice;
                $item = new OrderItem();

                // Add component stock
                // Component::where('id', $key)
                //     ->increment('in_stock', (int) $row['qty']);

                $item->forceFill(
                    [
                        'order_id' => $order->id,
                        'component_id' => $key,
                        'qty' => $row['qty'],
                        'unit_price' => $row['unit_price'],
                        'total_price' => $totalPrice,
                        'vehicle_number' => $row['vehicle_number'],
                        'description' => $row['description'],
                    ]
                )->save();
            }

            // update order total price
            $order->total_price = $sumPrice;
            $order->save();

            return $order;
        });
    }
}
