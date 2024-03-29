<?php

namespace App\Actions\Users;

use App\Actions\BaseDataTable;
use App\Models\User;
use App\Supports\Cache\UserCache;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DTUser extends BaseDataTable
{
    protected $resource = DTUserResource::class;

    protected function query(): EloquentBuilder|QueryBuilder
    {
        $heads = ['name', 'email', 'created_at'];

        $search = request()->query('search')['value'];
        $order = request()->query('order')[0]['column'];
        $dir = request()->query('order')[0]['dir'];

        return User::query()->select(['id', 'name', 'email', 'created_at'])
            ->when($search, fn ($query) => $query->mesearch(['name', 'email'], $search))
            ->orderBy($heads[$order], $dir);
    }

    protected function recordsTotal(): int
    {
        return User::count();
    }
}
