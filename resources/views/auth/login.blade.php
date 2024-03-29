@extends('components.layouts.base-without-navbar')

@section('content')
    @if ($errors->any())
        <input type="hidden" name="error_type" value="error" />
        <input type="hidden" name="error_message" value="{{ $errors->all()[0] }}">
    @endif

    <div class="absolute top-0 left-0 grid w-full h-full place-content-center">
        <div class="border shadow-xl card w-96 bg-base-100">
            <div class="card-body">
                <h2 class="card-title">Hello, Login dulu yaak</h2>
                <p>Pastiin email dan password yang kamu inputkan udah benar yaa :)</p>

                <form action="{{ route('login') }}" method="POST" class="mt-4 space-y-2">
                    @csrf

                    <x-forms.input-email name="email" value="{{ old('email') }}" required />
                    <x-forms.input-password name="password" required />

                    <div class="form-control">
                        <label class="cursor-pointer label">
                            <span class="label-text">Remember me</span>
                            <input type="checkbox" class="toggle" checked />
                        </label>
                    </div>

                    <div class="!mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
