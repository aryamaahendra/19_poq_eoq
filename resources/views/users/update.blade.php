@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Master Data</a></li>
                <li><a>Pengguna</a></li>
                <li>Update Pengguna</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-lg mx-auto my-6 main-card">
        <form action="{{ route('dshb.users.update', ['m_user' => $user->id]) }}" method="POST" class="card-body">
            @csrf
            @method('PUT')

            <x-forms.label-with-error name="name" label="Full Name" required="{{ true }}">
                <x-forms.input-text type="text" name="name" placeholder="Nama Aku Bambang"
                    value="{{ old('name') ?? $user->name }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="email" label="Email" required="{{ true }}">
                <x-forms.input-text type="email" name="email" placeholder="email@aku.com"
                    value="{{ old('email') ?? $user->email }}" required />
            </x-forms.label-with-error>

            <div class="flex justify-end !mt-3 gap-1">
                <a href="{{ route('dshb.users.index') }}" class="btn btn-primary btn-ghost">
                    <x-icons.arrow-left class="w-4 h-4" />
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
