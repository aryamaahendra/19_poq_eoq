@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Transaksi</a></li>
                <li><a>Pembelian</a></li>
                <li>List Pembelian</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="order-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
                    <a href="{{ route('dshb.order.recommended') }}" class="btn btn-secondary">
                        <span>RECOMMENDED</span>
                        {{-- <x-icons.plus class="w-5 h-5 stroke-current" /> --}}
                    </a>
                    <a href="{{ route('dshb.order.create') }}" class="btn btn-primary">
                        <span>TAMBAH</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </a>
                </div>
            </div>

            <table id="order-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="No" />
                    <x-th-shortable text="Diterima Dari" />
                    <x-th-shortable text="Tanggal" />
                    <x-th-shortable text="Total Item" />
                    <x-th-shortable text="Total Harga" />
                    <x-th-shortable text="Status" />
                    <th class="w-1"></th>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
