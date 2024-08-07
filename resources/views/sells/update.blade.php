@extends('components.layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div role="alert" class="w-full max-w-6xl mx-auto mt-6 alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Error! {{ $errors->all()[0] }}.</span>
        </div>
    @endif

    <div class="w-full max-w-6xl mx-auto mt-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a>Master Data</a></li>
                <li><a>Pemakaian</a></li>
                <li>Ubah Pemakaian</li>
            </ul>
        </div>
    </div>

    <div class="w-full max-w-6xl mx-auto my-6 main-card sell">
        <form action="{{ route('dshb.sell.update', ['m_sell' => $sell->id]) }}" method="POST" class="card-body">
            @csrf
            @method('PUT')

            @php
                $olds = old('components');
                if (empty($olds)) {
                    $olds = [];
                    foreach ($sell->items as $item) {
                        $olds[$item->component->id]['label'] = $item->component->name;
                        $olds[$item->component->id]['unit_price'] = $item->unit_price;
                        $olds[$item->component->id]['qty'] = $item->qty;
                        $olds[$item->component->id]['vehicle_number'] = 0;
                        $olds[$item->component->id]['description'] = $item->description;
                    }
                }
            @endphp

            <div class="">
                <div class="flex justify-end gap-1">
                    <a href="{{ route('dshb.users.index') }}" class="btn btn-primary btn-ghost">
                        <x-icons.arrow-left class="w-4 h-4" />
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

                <div class="grid grid-cols-2 gap-2 pb-8 mb-8 border-b">
                    <x-forms.label-with-error name="no" label="No." required="{{ true }}">
                        <x-forms.input-text type="text" name="no" placeholder="**/ST/2022"
                            value="{{ old('no') ?? $sell->no }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="date" label="Tanggal" required="{{ true }}">
                        <x-forms.input-text type="date" name="date" value="{{ old('date') ?? $sell->date }}"
                            required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="vehicle_number" label="No Kendaraan" required="{{ true }}">
                        <x-forms.input-text type="text" name="vehicle_number" placeholder="DN 9999 QQ"
                            value="{{ old('vehicle_number') ?? $sell->vehicle_number }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="driver_name" label="Nama Supir" required="{{ true }}">
                        <x-forms.input-text type="text" name="driver_name" placeholder="Jhon Doe"
                            value="{{ old('driver_name') ?? $sell->driver_name }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="company" label="Nama Perusahaan" required="{{ true }}">
                        <x-forms.input-text type="text" name="company" placeholder="CV. Apalah"
                            value="{{ old('company') ?? $sell->company }}" required />
                    </x-forms.label-with-error>
                </div>

                @include('orders.partials.selec-components', compact('olds'))

            </div>
        </form>
    </div>
@endsection
