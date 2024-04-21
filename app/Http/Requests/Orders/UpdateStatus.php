<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use App\Models\Kanban;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateStatus extends FormRequest implements Fulfill
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
            'status' => ['required', 'string', 'in:pendding,dileviry,success']
        ];
    }

    public function fulfill(): mixed
    {
        $order = $this->route('m_order');
        $order->load('items');
        $status = $this->validated('status');

        DB::transaction(function () use ($order, $status) {
            foreach ($order->items as $item) {
                if ($status == 'success' && $order->status != 'success') {
                    Component::where('id', $item->component_id)
                        ->increment('in_stock', (int) $item->qty);
                } elseif ($status != 'success' && $order->status == 'success') {
                    Component::where('id', $item->component_id)
                        ->decrement('in_stock', (int) $item->qty);
                }
            }

            $kanban = Kanban::first();
            $board = json_decode($kanban->board, true);

            switch ($order->status) {
                case 'pendding':
                    $items = $board[0]['item'];
                    $idx = array_search($order->id, array_column($items, 'order'));
                    unset($items[$idx]);
                    $board[0]['item'] = array_values($items);
                    break;

                case 'dileviry':
                    $items = $board[1]['item'];
                    $idx = array_search($order->id, array_column($items, 'order'));
                    unset($items[$idx]);
                    $board[1]['item'] = array_values($items);
                    break;

                case 'success':
                    $items = $board[2]['item'];
                    $idx = array_search($order->id, array_column($items, 'order'));
                    unset($items[$idx]);
                    $board[2]['item'] = array_values($items);
                    break;

                default:
                    abort('status undefined!');
                    break;
            }

            switch ($status) {
                case 'pendding':
                    array_push($board[0]['item'], [
                        'id' => Str::orderedUuid(),
                        'title' => $order->no,
                        'orderID' => $order->id,
                    ]);
                    break;

                case 'dileviry':
                    array_push($board[1]['item'], [
                        'id' => Str::orderedUuid(),
                        'title' => $order->no,
                        'orderID' => $order->id,
                    ]);
                    break;

                case 'success':
                    array_push($board[2]['item'], [
                        'id' => Str::orderedUuid(),
                        'title' => $order->no,
                        'orderID' => $order->id,
                    ]);
                    break;

                default:
                    abort('status undefined!');
                    break;
            }

            $kanban->update(['board' => $board]);
            $order->update(['status' => $status]);
        });

        return $order;
    }
}
