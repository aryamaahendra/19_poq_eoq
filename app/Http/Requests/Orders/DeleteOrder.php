<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use App\Models\Kanban;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DeleteOrder extends FormRequest implements Fulfill
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
        $order = $this->route('m_order');
        $order->load('items');

        return DB::transaction(function () use ($order) {
            if ($order->status == 'success') {
                foreach ($order->items as $item) {
                    // Subtract component stock
                    Component::where('id', $item->component_id)->decrement('in_stock', (int) $item->qty);
                }
            }

            // Delete all items
            $order->items()->delete();

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

            $kanban->update(['board' => $board]);

            return $order->delete();
        });
    }
}
