@extends('components.layouts.base')

@section('content')
    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="components-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
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
