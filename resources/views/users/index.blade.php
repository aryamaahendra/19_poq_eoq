@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Master Data</a></li>
                <li><a>Pengguna</a></li>
                <li>List Pengguna</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <div class="p-0 card-body" datatable="users-table">
            <div class="flex items-center justify-between px-4 pt-4 mb-2">
                <div class="flex items-center gap-1">
                    <x-forms.perpage />
                    <x-forms.search />
                </div>

                <div class="flex items-center gap-1">
                    <a href="{{ route('dshb.users.create') }}" class="btn btn-primary">
                        <span>TAMBAH</span>
                        <x-icons.plus class="w-5 h-5 stroke-current" />
                    </a>
                </div>
            </div>

            <table id="users-table" class="w-full border-t border-b stripe">
                <thead>
                    <x-th-shortable text="Name" />
                    <x-th-shortable text="Email" />
                    <x-th-shortable text="Dibuat" />
                    <th class="w-1"></th>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
