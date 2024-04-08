<?php

namespace App\Actions\Algorithm;

use App\Actions\BaseDataTable;
use App\Models\Algorithm;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DTAlgorithm extends BaseDataTable
{
    protected $resource = DTAlgorithmResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['component.name', 'POQ', 'EOQ', 'ROP', 'order_frequency', 'created_at'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return Algorithm::query()->with(['component'])->when(
            $search,
            fn ($query) => $query->mesearch(['component.name'], $search)
        )
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return Algorithm::count();
    }
}
