<div class="shadow-md">
    <div class="w-full max-w-6xl mx-auto navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                </ul>
            </div>
            <a class="text-xl btn btn-ghost">daisyUI</a>
        </div>
        <div class="hidden navbar-center lg:flex">
            <ul class="px-1 menu menu-horizontal">
            </ul>
        </div>
        <div class="navbar-end">
            @if (Auth::check())
                <a href="{{ route('dshb.index') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    </div>
</div>
