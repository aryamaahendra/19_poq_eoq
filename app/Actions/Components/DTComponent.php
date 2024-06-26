<?php

namespace App\Actions\Components;

use App\Actions\BaseDataTable;
use App\Models\Component;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DTComponent extends BaseDataTable
{
    protected $resource = DTComponentResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['name', 'category_id', 'in_stock', 'measurement', 'created_at'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return Component::query()->with(['category'])->select(['id', 'name', 'measurement', 'in_stock', 'category_id'])
            ->when($search, fn ($query) => $query->mesearch(['name'], $search))
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return Component::count();
    }
}
