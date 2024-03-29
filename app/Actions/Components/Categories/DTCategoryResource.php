<?php

namespace App\Actions\Components\Categories;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DTCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
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
