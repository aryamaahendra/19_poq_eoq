@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-lg mx-auto my-6 main-card">
        <form action="{{ route('dshb.users.store') }}" method="POST" class="card-body">
            @csrf
            @method('POST')

            <x-forms.label-with-error name="name" label="Full Name" required="{{ true }}">
                <x-forms.input-text type="text" name="name" placeholder="Nama Aku Bambang"
                    value="{{ old('name') }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="email" label="Email" required="{{ true }}">
                <x-forms.input-text type="email" name="email" placeholder="email@aku.com"
                    value="{{ old('email') }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="password" label="Password" required="{{ true }}">
                <x-forms.input-text type="password" name="password" placeholder="******"
                    value="{{ old('password') }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="password_confirmation" label="Konfirmasi Password"
                value="{{ old('name') }}" required="{{ true }}">
                <x-forms.input-text type="password" name="password_confirmation" placeholder="******"
                    required />
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
