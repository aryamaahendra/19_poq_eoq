<?php

namespace App\Http\Requests\Sells;

use App\Http\Requests\Fulfill;
use App\Models\Component;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DeleteSell extends FormRequest implements Fulfill
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
        $sell = $this->route('m_sell');
        $sell->load('items');

        return DB::transaction(function () use ($sell) {
            foreach ($sell->items as $item) {
                // Subtract component stock
                Component::where('id', $item->component_id)->increment('in_stock', (int) $item->qty);
            }

            // Delete all items
            $sell->items()->delete();

            return $sell->delete();
        });
    }
}
