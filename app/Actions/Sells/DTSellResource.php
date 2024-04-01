<?php

namespace App\Actions\Sells;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DTSellResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // 'no', 'date', 'vehicle_number', 'driver_name', 'company',
        return [
            'id' => $this->id,
            'no' => $this->no,
            'vehicle_number' => $this->vehicle_number,
            'driver_name' => $this->driver_name,
            'company' => $this->company,
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
