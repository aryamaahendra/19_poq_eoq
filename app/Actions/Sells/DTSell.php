<?php

namespace App\Actions\Sells;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use App\Actions\BaseDataTable;
use App\Models\Order;
use App\Models\Sell;
use Illuminate\Support\Facades\Auth;

class DTSell extends BaseDataTable
{
    protected $resource = DTSellResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['no', 'date', 'vehicle_number', 'driver_name', 'company', 'total_price'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return Sell::query()->when(
            $search,
            fn ($query) => $query->mesearch(['no', 'vehicle_number', 'driver_name', 'company',], $search)
        )
            ->when(!Auth::user()->is_admin, fn ($query) => $query->where('user_id', Auth::user()->id))
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return Sell::when(
            !Auth::user()->is_admin,
            fn ($query) => $query->where('user_id', Auth::user()->id)
        )->count();
    }
}
