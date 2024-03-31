<?php

namespace App\Actions\Orders;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DTOrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no' => $this->no,
            'from' => $this->from,
            'total_item' => $this->total_item,
            'total_price' => $this->total_price,
            'date' => Carbon::create($this->date)->format('D, d M Y'),
            'actions' => [
                // 'enabled' => request()->user()->can('enabled', $this->resource),
                // 'disabled' => request()->user()->can('disabled', $this->resource),
                // 'update' => request()->user()->can('update', $this->resource),
                // 'delete' => request()->user()->can('forceDelete', $this->resource),
            ],
        ];
    }
}
