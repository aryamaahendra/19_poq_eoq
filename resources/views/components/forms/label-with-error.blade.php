@props(['label' => '', 'name', 'required' => false])

<label class="w-full form-control">
    <div class="label">
        <span class="label-text">
            {{ $label }}
            @if ($required)
                <span class="text-error">*</span>
            @endif
        </span>
    </div>

    {{ $slot }}

    @error($name)
        <div class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror
</label>
