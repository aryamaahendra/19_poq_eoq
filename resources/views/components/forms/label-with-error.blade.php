@props(['label' => '', 'name'])

<label class="w-full max-w-xs form-control">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>

    {{ $slot }}

    @error($name)
        <div class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </div>
    @enderror
</label>
