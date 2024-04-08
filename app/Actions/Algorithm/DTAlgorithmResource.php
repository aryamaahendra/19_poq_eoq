<?php

namespace App\Actions\Algorithm;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DTAlgorithmResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'component_name' => $this->component->name,
            'POQ' => $this->POQ,
            'EOQ' => $this->EOQ,
            'ROP' => $this->ROP,
            'order_frequency' => $this->order_frequency,
            'created_at' => Carbon::create($this->created_at)->diffForHumans(),
            'actions' => [
                // 'enabled' => request()->user()->can('enabled', $this->resource),
                // 'disabled' => request()->user()->can('disabled', $this->resource),
                // 'update' => request()->user()->can('update', $this->resource),
                // 'delete' => request()->user()->can('forceDelete', $this->resource),
            ],
        ];
    }
}
