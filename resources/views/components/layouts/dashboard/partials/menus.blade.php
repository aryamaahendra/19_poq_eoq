<li>
    <a href="{{ route('dshb.index') }}" @class(['active' => Route::is('dshb.index')])>
        <x-icons.gauge class="w-5 h-5" />
        <span>Dashbaord</span>
    </a>
</li>
<li>
    <a>
        <x-icons.shopping-cart class="w-5 h-5" />
        <span>Penjualan</span>
    </a>
</li>
<li>
    <details>
        <summary @class([
            'active' =>
                Route::is('dshb.users.*') || Route::is('dshb.components.categories.*'),
        ])>
            <x-icons.database class="w-5 h-5" />
            <span>Master Data</span>
        </summary>

        <ul class="gap-1 !border shadow-md !mt-6 w-60 space-y-1 z-30">
            <li>
                <a>
                    <x-icons.box class="w-5 h-5" />
                    <span>Components</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dshb.components.categories.index') }}"
                    @class(['active' => Route::is('dshb.components.categories.*')])>
                    <x-icons.box class="w-5 h-5" />
                    <span>Kategori Components</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dshb.users.index') }}" @class(['active' => Route::is('dshb.users.*')])>
                    <x-icons.users class="w-5 h-5" />
                    <span>Pengguna</span>
                </a>
            </li>
        </ul>
    </details>
</li>
