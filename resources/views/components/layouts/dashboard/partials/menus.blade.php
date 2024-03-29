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
        <summary>
            <x-icons.database class="w-5 h-5" />
            <span>Master Data</span>
        </summary>

        <ul class="gap-1 !border shadow-md !mt-6 w-52">
            <li>
                <a>
                    <x-icons.box class="w-5 h-5" />
                    <span>Sprepart</span>
                </a>
            </li>

            <li>
                <a>
                    <x-icons.box class="w-5 h-5" />
                    <span>Kategori Sprepart</span>
                </a>
            </li>

            <li>
                <a>
                    <x-icons.users class="w-5 h-5" />
                    <span>Pengguna</span>
                </a>
            </li>
        </ul>
    </details>
</li>