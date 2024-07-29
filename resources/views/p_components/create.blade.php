@extends('components.layouts.dashboard')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Master Data</a></li>
                <li><a>Component</a></li>
                <li>Tambah Component</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-lg mx-auto my-6 main-card">
        <form action="{{ route('dshb.components.store') }}" method="POST" class="card-body">
            @csrf
            @method('POST')

            <x-forms.label-with-error name="name" label="Name" required="{{ true }}">
                <x-forms.input-text type="text" name="name" placeholder="spare part" value="{{ old('name') }}"
                    required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="category_id" label="Category" required="{{ true }}">

                <select name="category_id" class="w-full select select-bordered">
                    <option disabled selected>pilih category</option>
                    @forelse ($categories as $category)
                        <option @selected($category->id == old('category_id')) value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @empty
                    @endforelse
                </select>
            </x-forms.label-with-error>

            <x-forms.label-with-error name="measurement" label="Satuan Akur" required="{{ true }}">

                <select name="measurement" class="w-full select select-bordered">
                    <option disabled selected>pilih category</option>
                    @forelse (Measurement::all() as $measurement)
                        <option @selected($measurement == old('measurement')) value="{{ $measurement }}">
                            {{ $measurement }}
                        </option>
                    @empty
                    @endforelse
                </select>
            </x-forms.label-with-error>

            <x-forms.label-with-error name="order_cost" label="Biaya Pemesanan" required="{{ true }}">
                <x-forms.input-text type="number" min="1" name="order_cost" placeholder="10000"
                    value="{{ old('order_cost') }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="holding_cost_unit" label="Biaya Penyimpanan" required="{{ true }}">
                <x-forms.input-text type="number" min="1" name="holding_cost_unit" placeholder="100"
                    value="{{ old('holding_cost_unit') }}" required />
            </x-forms.label-with-error>

            <x-forms.label-with-error name="lead_time" label="Lead Time" required="{{ true }}">
                <x-forms.input-text type="number" min="1" name="lead_time" placeholder="1"
                    value="{{ old('lead_time') }}" required />
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
