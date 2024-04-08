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
                    <a href="{{ route('dshb.algoritm.proses') }}" class="btn btn-primary">
                        <span>PROSES</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </a>
                </div>
            </div>

            <table id="algorithm-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="Name" />
                    <x-th-shortable text="POQ" />
                    <x-th-shortable text="EOQ" />
                    <x-th-shortable text="ROP" />
                    <x-th-shortable text="Order Frequency" />
                    <th class="w-1"></th>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
