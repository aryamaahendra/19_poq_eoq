<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use App\Models\Kanban;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateOrder extends FormRequest implements Fulfill
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
            "components.*.vehicle_number" => ['required', 'string'],
            "components.*.description" => ['required', 'string'],
            "no" => ['required', 'string'],
            "date" => ['required', 'date'],
            "from" => ['required', 'string'],
            "at" => ['required', 'string'],
        ];
    }

    public function fulfill(): mixed
    {
        $inputs = $this->validated();
        return DB::transaction(function () use ($inputs) {
            // Create Order
            $order = new Order();
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

            // Create oreder item
            foreach ($inputs['components'] as $key => $row) {
                $totalPrice = (int) $row['qty'] * (int) $row['unit_price'];
                $sumPrice += $totalPrice;
                $item = new OrderItem();

                // Add component stock
                Component::where('id', $key)
                    ->increment('in_stock', (int) $row['qty']);

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

            $kanban = Kanban::first();
            $board = json_decode($kanban->board, true);

            array_push($board[0]['item'], [
                'id' => Str::orderedUuid(),
                'title' => $order->no,
                'order' => $order->id,
            ]);

            $kanban->update(['board' => json_encode($board)]);

            return $order;
        });
    }
}
