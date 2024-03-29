<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

abstract class BaseDataTable
{
    // Laravel Resource class to transform data
    protected $resource = null;

    abstract protected function query(): EloquentBuilder|QueryBuilder;

    abstract protected function recordsTotal(): int;

    protected function recordsFiltered(): int
    {
        if (request()->query('search')['value']) {
            return $this->query()->count('id');
        }

        return $this->recordsTotal();
    }

    public function data(): mixed
    {
        $data = $this->query()
            ->offset((int) request()->query('start'))
            ->limit((int) request()->query('length'))->get();

        if ($this->resource == null) {
            return $data;
        } // return data as it is

        return $this->resource::collection($data); // transform data
    }

    // return data as datatable json format
    public function json(): array
    {
        return [
            'draw' => (int) request()->query('draw'),
            'recordsTotal' => $this->recordsTotal(),
            'recordsFiltered' => $this->recordsFiltered(),
            'data' => $this->data(),
        ];
    }
}
