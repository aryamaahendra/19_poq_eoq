@extends('components.layouts.dashboard')

@section('content')
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
        <form action="{{ route('dshb.algoritm.proses', []) }}" class="modal-box">
            <h3 class="text-lg font-bold">PROSES EOQ & POQ</h3>

            <div>
                <x-forms.label-with-error name="maxof" label="Max OF (Order Frequency)"
                    required="{{ true }}">
                    <x-forms.input-text type="number" min="1" name="maxof" placeholder="1"
                        value="{{ old('no') }}" required />
                </x-forms.label-with-error>
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Proses</button>
                <button type="button" onclick="proses__modal.close()" class="btn">Close</button>
            </div>
        </form>
    </dialog>
@endpush
