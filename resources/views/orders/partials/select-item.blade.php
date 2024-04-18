@props(['old', 'key', 'compt' => null])

<div id="component-item-{{ $key }}" class="p-4 border border-base-300 rounded-3xl">
    <div class="flex items-start justify-between gap-2">
        <div class="">
            <div class="flex-1 mb-2">
                @if ($compt)
                    <div class="mr-1 badge badge-neutral">Recommended</div>
                @endif

                <span>{{ $old['label'] }}</span>
            </div>

            <div class="flex gap-4 text-sm text-base-content/60">
                <div>
                    <span>IN STOCK: </span>
                    <span>{{ $compt?->in_stock ?? '-' }}</span>
                </div>
                <div>
                    <span>POQ: </span>
                    <span>{{ $compt?->algorithm->POQ ?? '-' }}</span>
                </div>
                <div>
                    <span>EOQ: </span>
                    <span>{{ $compt?->algorithm->EOQ ?? '-' }}</span>
                </div>
                <div>
                    <span>ROP: </span>
                    <span>{{ $compt?->algorithm->ROP ?? '-' }}</span>
                </div>
            </div>
        </div>
        <button delete-component="{{ $key }}" tabindex="-1" type="button"
            class="btn btn-xs btn-error">
            hapus
        </button>
    </div>

    <div class="grid grid-cols-2 gap-2 mt-4">
        <input type="hidden" name="components[{{ $key }}][label]"
            value="{{ $old['label'] }}" />
        <label class="flex items-center gap-2 input input-sm input-bordered">
            <span class="text-base-content/60">Harga Unit: </span>
            <input type="text" name="components[{{ $key }}][unit_price]" class="grow"
                placeholder="1000000" value="{{ $old['unit_price'] }}" required />
        </label>

        <label class="flex items-center gap-2 input input-sm input-bordered">
            <span class="text-base-content/60">Quantity: </span>
            <input type="text" name="components[{{ $key }}][qty]" class="grow"
                placeholder="9999" value="{{ $old['qty'] }}" required />
            <span class="text-base-content/60">Buah</span>
        </label>

        <label class="flex items-center gap-2 input input-sm input-bordered vehicle_number_wrapper">
            <span class="text-base-content/60">No Kendaraan: </span>
            <input type="text" name="components[{{ $key }}][vehicle_number]"
                class="grow" placeholder="DN 9999 WR" value="{{ $old['vehicle_number'] }}" />
        </label>

        <label class="flex items-center gap-2 input input-sm input-bordered">
            <span class="text-base-content/60">Ket: </span>
            <input type="text" name="components[{{ $key }}][description]"
                class="grow" placeholder="-" value="{{ $old['description'] }}" required />
        </label>
    </div>
</div>
