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
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 gap-1">
                    @include('components.layouts.dashboard.partials.menus')
                </ul>
            </div>
            <a class="text-xl btn btn-ghost">daisyUI</a>
        </div>
        <div class="hidden navbar-center lg:flex">
            <ul class="gap-1 px-1 menu menu-horizontal">
                @include('components.layouts.dashboard.partials.menus')
            </ul>
        </div>
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="avatar" src="{{ Auth::user()->getAvatar() }}" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-4 z-[1] p-2 shadow-md border menu menu-sm dropdown-content bg-base-100 rounded-box w-52 gap-1">
                    <li><a>Settings</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf

                            <button type="submit" class="w-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
