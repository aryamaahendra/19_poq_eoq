<li>
    <a href="{{ route('dshb.index') }}" @class(['active' => Route::is('dshb.index')])>
        <x-icons.gauge class="w-5 h-5" />
        <span>Dashbaord</span>
    </a>
</li>
<li>
    <details>
        <summary @class([
            'active' => Route::is('dshb.sell.*') || Route::is('dshb.order.*'),
        ])>
            <x-icons.shopping-bag class="w-5 h-5" />
            <span>Transaksi</span>
        </summary>

        <ul class="gap-1 !border shadow-md !mt-6 w-48 space-y-1 z-30">
            <li>
                <a href="{{ route('dshb.sell.index') }}" @class(['active' => Route::is('dshb.sell.*')])>
                    <x-icons.shopping-bag-minus class="w-5 h-5" />
                    <span>Penjualan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('dshb.order.index') }}" @class(['active' => Route::is('dshb.order.*')])>
                    <x-icons.shopping-bag-plus class="w-5 h-5" />
                    <span>Pembelian</span>
                </a>
            </li>
        </ul>
    </details>
</li>
<li>
    <details>
        <summary @class([
            'active' =>
                Route::is('dshb.users.*') ||
                Route::is('dshb.components.categories.*') ||
                Route::is('dshb.components.*'),
        ])>
            <x-icons.database class="w-5 h-5" />
            <span>Master Data</span>
        </summary>

        <ul class="gap-1 !border shadow-md !mt-6 w-60 space-y-1 z-30">
            <li>
                <a href="{{ route('dshb.components.index') }}" @class([
                    'active' =>
                        Route::is('dshb.components.*') &&
                        !Route::is('dshb.components.categories.*'),
                ])>
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
