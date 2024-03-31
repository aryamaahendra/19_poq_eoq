<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\Fulfill;
use App\Models\Component;
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
            foreach ($order->items as $item) {
                // Subtract component stock
                Component::where('id', $item->component_id)->decrement('in_stock', (int) $item->qty);
            }

            // Delete all items
            $order->items()->delete();

            return $order->delete();
        });
    }
}
