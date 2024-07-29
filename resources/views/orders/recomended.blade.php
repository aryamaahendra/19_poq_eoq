@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Transaksi</a></li>
                <li><a>Pembelian</a></li>
                <li>Rekomendasi Pembelian</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <form action="{{ route('dshb.order.create') }}" method="GET" class="p-0 card-body" datatable="">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">

                </div>

                <div class="flex items-center gap-1">
                    <button type="submit" class="btn btn-primary">
                        <span>TAMBAH</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </button>
                </div>
            </div>

            <table class="w-full border-t border-b stripe">
                <thead>
                    <th class="w-1">
                        <div class="grid place-content-center">
                            <input type="checkbox" class="checkbox" />
                        </div>
                    </th>
                    <x-th-shortable text="Nama Component" />
                    <x-th-shortable text="Category" />
                    <x-th-shortable text="In Stock" />
                    <x-th-shortable text="Order QTY" />
                </thead>

                <tbody>
                    @forelse ($rows as $row)
                        <tr>
                            <td>
                                <div class="grid place-content-center">
                                    <input type="checkbox" name="components[]" class="checkbox"
                                        value="{{ $row->id }}" />
                                </div>
                            </td>
                            <td>{{ $row->name }}</td>
                            <td class="uppercase">{{ $row->category->name }}</td>
                            <td class="w-1">{{ $row->in_stock }}</td>
                            <td class="w-1">{{ $row->algorithm->EOQ }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </form>
    </div>
@endsection
