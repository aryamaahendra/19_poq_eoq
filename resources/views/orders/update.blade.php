@extends('components.layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div role="alert" class="w-full max-w-6xl mx-auto mt-6 alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Error! {{ $errors->all()[0] }}.</span>
        </div>
    @endif

    <div class="w-full max-w-6xl mx-auto my-6 main-card">
        <form action="{{ route('dshb.order.update', ['m_order' => $order->id]) }}" method="POST"
            class="card-body">
            @csrf
            @method('PUT')

            @php
                $olds = old('components');
                if (empty($olds)) {
                    $olds = [];
                    foreach ($order->items as $item) {
                        $olds[$item->component->id]['label'] = $item->component->name;
                        $olds[$item->component->id]['unit_price'] = $item->unit_price;
                        $olds[$item->component->id]['qty'] = $item->qty;
                        $olds[$item->component->id]['vehicle_number'] = $item->vehicle_number;
                        $olds[$item->component->id]['description'] = $item->description;
                    }
                }
            @endphp

            <div class="grid grid-cols-2 gap-12">
                @include('orders.partials.selec-components', compact('olds'))

                <div class="space-y-2">
                    <x-forms.label-with-error name="no" label="No."
                        required="{{ true }}">
                        <x-forms.input-text type="text" name="no" placeholder="**/ST/2022"
                            value="{{ old('no') ?? $order->no }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="date" label="Tanggal"
                        required="{{ true }}">
                        <x-forms.input-text type="date" name="date"
                            value="{{ old('date') ?? $order->date }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="from" label="Diterima Dari"
                        required="{{ true }}">
                        <x-forms.input-text type="text" name="from" placeholder="CV. Kapan Lagi"
                            value="{{ old('from') ?? $order->from }}" required />
                    </x-forms.label-with-error>

                    <x-forms.label-with-error name="at" label="Di"
                        required="{{ true }}">
                        <x-forms.input-text type="text" name="at" placeholder="-"
                            value="{{ old('at') ?? $order->at }}" required />
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
                </div>
            </div>
        </form>
    </div>
@endsection
