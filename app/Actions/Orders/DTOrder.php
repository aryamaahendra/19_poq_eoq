<?php

namespace App\Actions\Orders;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use App\Actions\BaseDataTable;
use App\Models\Order;

class DTOrder extends BaseDataTable
{
    protected $resource = DTOrderResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['no', 'from', 'date', 'total_item', 'total_price'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return Order::query()->when(
            $search,
            fn ($query) => $query->mesearch(['from', 'no'], $search)
        )
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return Order::count();
    }
}
