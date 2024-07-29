@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Transaksi</a></li>
                <li>POQ & EOQ</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="algorithm-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
                    <button type="button" onclick="proses__modal.showModal()" class="btn btn-primary">
                        <span>PROSES</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </button>
                </div>
            </div>

            <div class="flex gap-4 px-4 mt-2 mb-2">
                <div>Max Order Frequency: {{ $data != null ? $data['maxof'] : -1 }}x per bulan</div>
                <div>Tanggal Pemesanan:
                    {{ $data != null ? \Illuminate\Support\Arr::join($data['dates'], ', ', ' dan ') : -1 }}
                </div>
            </div>

            <table id="algorithm-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="Name" />
                    <x-th-shortable text="POQ" />
                    <x-th-shortable text="EOQ" />
                    <x-th-shortable text="ROP" />
                    <x-th-shortable text="OF" />
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
    <dialog id="proses__modal" class="modal">
        <form action="{{ route('dshb.algoritm.proses', []) }}" class="modal-box" method="POST">
            @csrf

            <h3 class="text-lg font-bold">PROSES EOQ & POQ</h3>

            <div id="proses_algo_wrapper" class="space-y-2">
                <x-forms.label-with-error name="maxof" label="Max OF (Order Frequency)" required="{{ true }}">
                    <x-forms.input-text type="number" min="1" name="maxof" placeholder="1"
                        value="{{ old('no') }}" required />
                </x-forms.label-with-error>

                <x-forms.label-with-error name="order_date" label="Tanggal Pemesanan (no space)"
                    required="{{ true }}">
                    <x-forms.input-text type="text" name="order_date" placeholder="1,15,29" value="{{ old('no') }}"
                        required />
                </x-forms.label-with-error>
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Proses</button>
                <button type="button" onclick="proses__modal.close()" class="btn">Close</button>
            </div>
        </form>
    </dialog>
@endpush
