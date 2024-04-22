@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="components-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
                    <button onclick="export_monthly.showModal()" class="btn btn-secondary">
                        <span>EXPORT BULANAN</span>
                        {{-- <x-icons.plus class="w-5 h-5 stroke-current" /> --}}
                    </button>

                    <a href="{{ route('dshb.components.create') }}" class="btn btn-primary">
                        <span>TAMBAH</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </a>
                </div>
            </div>

            <table id="components-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="Name" />
                    <x-th-shortable text="Category" />
                    <x-th-shortable text="In Stock" />
                    <x-th-shortable text="Satuan Ukur" />
                    <x-th-shortable text="Dibuat" />
                    <th class="w-1"></th>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('modal')
    <!-- Open the modal using ID.showModal() method -->
    <dialog id="export_monthly" class="modal">
        <form action="{{ route('dshb.export.monthly') }}" method="GET" class="modal-box">
            <h3 class="text-lg font-bold">Hello!</h3>
            <div class="flex gap-2">
                <select name="month" class="w-full select select-bordered">
                    <option value="" disabled selected>Pilih Bulan</option>
                    <option value="1">JANUARI</option>
                    <option value="2">FEBRUARI</option>
                    <option value="3">MARET</option>
                    <option value="4">APRIL</option>
                    <option value="5">MEI</option>
                    <option value="6">JUNI</option>
                    <option value="7">JULI</option>
                    <option value="8">AGUSTUS</option>
                    <option value="9">SEPTEMBER</option>
                    <option value="10">OKTOBER</option>
                    <option value="11">NOVEMBER</option>
                    <option value="12">DESEMBER</option>
                </select>

                <input type="text" name="year" placeholder="2022"
                    class="w-full input input-bordered" />
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>

                <button type="submit" class="btn btn-primary">EXPORT</button>
            </div>
        </form>
    </dialog>
@endpush
