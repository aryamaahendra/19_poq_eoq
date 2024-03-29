@props(['text'])

<th class="">
    <div class="flex items-center gap-2">
        <div>{{ $text }}</div>
        <div class="inline-flex items-center">
            <x-icons.arrow-narrow-up class="w-4 h-4 stroke-base-300 up" />
            <x-icons.arrow-narrow-down class="w-4 h-4 -ml-2 stroke-base-300 down" />
        </div>
    </div>
</th>
