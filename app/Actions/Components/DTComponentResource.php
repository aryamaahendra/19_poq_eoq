<?php

namespace App\Actions\Components;

use App\Actions\Components\Categories\DTCategoryResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DTComponentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'measurement' => $this->measurement,
            'in_stock' => $this->in_stock,
            'category' => new DTCategoryResource($this->category),
            'created_at' => Carbon::create($this->created_at)->diffForHumans(),
            'actions' => [
                'update' => request()->user()?->is_admin,
                'delete' => request()->user()?->is_admin,
            ],
        ];
    }
}
