@props(['olds' => []])

<div class="">
    <x-forms.label-with-error name="" label="Component">
        <select choicejs="components" class="w-full select select-bordered">
            @forelse ($components as $component)
                <option value="{{ $component->id }}" data-measurement="{{ $component->measurement }}">
                    {{ $component->name }}</option>
            @empty
            @endforelse
        </select>
    </x-forms.label-with-error>

    <div id="component-container" class="mt-8 space-y-2">
        @if (empty($olds) && isset($recommended) && $recommended != null)
            @forelse ($recommended as $key => $rec)
                @include('orders.partials.select-item', [
                    'old' => [
                        'label' => $rec->name,
                        'unit_price' => '0',
                        'qty' => $rec->algorithm->EOQ,
                        'vehicle_number' => 'Stock',
                        'description' => '-',
                    ],
                    'key' => $rec->id,
                    'compt' => $rec,
                ])
            @empty
            @endforelse
        @endif

        @if (!empty($olds))
            @forelse ($olds as $key => $old)
                @include('orders.partials.select-item', [
                    'old' => $old,
                    'key' => $key,
                ])
            @empty
            @endforelse
        @endif
    </div>
</div>
