@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Master Data</a></li>
                <li><a>Pemakaian</a></li>
                <li>List Pemakaian</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="sell-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
                    <a href="{{ route('dshb.sell.create') }}" class="btn btn-primary">
                        <span>TAMBAH</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </a>
                </div>
            </div>

            <table id="sell-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="No" />
                    <x-th-shortable text="Nomor Kendaraan" />
                    <x-th-shortable text="Nama Supir" />
                    <x-th-shortable text="Perusahaan" />
                    <x-th-shortable text="Total Harga" />
                    <x-th-shortable text="Tanggal" />
                    <th class="w-1"></th>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
