<?php

namespace App\Actions\Components\Categories;

use App\Actions\BaseDataTable;
use App\Models\ComponentCategory;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DTCategory extends BaseDataTable
{
    protected $resource = DTCategoryResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['name', 'created_at'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return ComponentCategory::query()->select(['id', 'name'])
            ->when($search, fn ($query) => $query->mesearch(['name'], $search))
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return ComponentCategory::count();
    }
}
