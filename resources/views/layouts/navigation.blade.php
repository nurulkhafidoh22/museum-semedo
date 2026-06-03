<nav
    x-data="{ scrolled: false, open: false }"
    x-init="
        scrolled = window.scrollY > 30;
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 30;
        });
    "
    :class="scrolled
        ? 'bg-[#0f2a2c]/95 backdrop-blur-md shadow-lg'
        : 'bg-transparent'"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out"
>

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center">

        <!-- LOGO -->
        <div class="flex items-center space-x-3">
            <img src="/images/museum-icon.png"
                 class="w-12 h-12 object-contain"
                 alt="Museum Semedo">

            <span class="text-2xl font-bold tracking-wide text-white">
                Museum Semedo
            </span>
        </div>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex items-center space-x-7 ml-auto text-white font-medium">

            <a href="/"
                class="relative group transition
                {{ request()->is('/')
                    ? 'text-[#1ecad3]'
                    : 'hover:text-[#1ecad3]' }}">

                Beranda

                <span class="absolute -bottom-1 left-0 h-[2px]
                    bg-[#1ecad3] transition-all duration-300
                    {{ request()->is('/')
                        ? 'w-full'
                        : 'w-0 group-hover:w-full' }}">
                </span>

            </a>

            <a href="/tentang"
                class="relative group transition
                {{ request()->is('tentang')
                    ? 'text-[#1ecad3]'
                    : 'hover:text-[#1ecad3]' }}">

                Tentang

                <span class="absolute -bottom-1 left-0 h-[2px]
                    bg-[#1ecad3] transition-all duration-300
                    {{ request()->is('tentang')
                        ? 'w-full'
                        : 'w-0 group-hover:w-full' }}">
                </span>

            </a>

            <a href="/informasi"
                class="relative group transition
                {{ request()->is('informasi')
                    ? 'text-[#1ecad3]'
                    : 'hover:text-[#1ecad3]' }}">

                Informasi

                <span class="absolute -bottom-1 left-0 h-[2px]
                    bg-[#1ecad3] transition-all duration-300
                    {{ request()->is('informasi')
                        ? 'w-full'
                        : 'w-0 group-hover:w-full' }}">
                </span>

            </a>

            <a href="/tiket"
                class="relative group transition
                {{ request()->is('tiket')
                    ? 'text-[#1ecad3]'
                    : 'hover:text-[#1ecad3]' }}">

                Tiket

                <span class="absolute -bottom-1 left-0 h-[2px]
                    bg-[#1ecad3] transition-all duration-300
                    {{ request()->is('tiket')
                        ? 'w-full'
                        : 'w-0 group-hover:w-full' }}">
                </span>

            </a>

            <a href="/koleksi"
                class="relative group transition
                {{ request()->is('koleksi')
                    ? 'text-[#1ecad3]'
                    : 'hover:text-[#1ecad3]' }}">

                Koleksi

                <span class="absolute -bottom-1 left-0 h-[2px]
                    bg-[#1ecad3] transition-all duration-300
                    {{ request()->is('koleksi')
                        ? 'w-full'
                        : 'w-0 group-hover:w-full' }}">
                </span>

            </a>

        </div>

        <!-- LOGIN / DASHBOARD -->
        <div class="hidden md:flex ml-6">
            @guest
                <a href="{{ route('login') }}"
                    class="px-5 py-2.5
                        rounded-xl

                        bg-transparent
                        border border-white/15

                        text-white
                        font-medium

                        hover:bg-white/10
                        hover:border-white/30

                        transition-all duration-300">

                        Login

                    </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}"
                class="px-5 py-2 rounded-full
                        bg-[#0f2a2c] text-white
                        font-semibold shadow-md
                        border-2 border-transparent

                        hover:bg-transparent
                        hover:text-white
                        hover:border-white

                        transition duration-300">
                    Dashboard
                </a>
            @endauth
        </div>

        <!-- HAMBURGER MOBILE -->
        <button @click="open = !open"
                class="md:hidden ml-auto text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- MENU MOBILE -->
    <div x-show="open"
        x-transition
        class="md:hidden
                bg-[#0f2a2c]/95
                backdrop-blur-lg
                px-6 pb-6">

        <div class="space-y-2">

            <a href="/"
                class="block px-4 py-3 rounded-xl transition

                {{ request()->is('/')
                    ? 'bg-white/10 text-[#1ecad3]'
                    : 'text-white hover:bg-white/5' }}">

                Beranda

            </a>

            <a href="/tentang"
                class="block px-4 py-3 rounded-xl transition

                {{ request()->is('tentang')
                    ? 'bg-white/10 text-[#1ecad3]'
                    : 'text-white hover:bg-white/5' }}">

                Tentang

            </a>

            <a href="/informasi"
                class="block px-4 py-3 rounded-xl transition

                {{ request()->is('informasi')
                    ? 'bg-white/10 text-[#1ecad3]'
                    : 'text-white hover:bg-white/5' }}">

                Informasi

            </a>

            <a href="/tiket"
                class="block px-4 py-3 rounded-xl transition

                {{ request()->is('tiket')
                    ? 'bg-white/10 text-[#1ecad3]'
                    : 'text-white hover:bg-white/5' }}">

                Tiket

            </a>

            <a href="/koleksi"
                class="block px-4 py-3 rounded-xl transition

                {{ request()->is('koleksi')
                    ? 'bg-white/10 text-[#1ecad3]'
                    : 'text-white hover:bg-white/5' }}">

                Koleksi

            </a>

        </div>

        @guest

            <a href="{{ route('login') }}"
            class="px-5 py-2.5
                rounded-xl

                bg-transparent
                border border-white/15

                text-white
                font-medium

                hover:bg-white/10
                hover:border-white/30

                transition-all duration-300">

                Login

            </a>
        @endguest

        @auth

            <a href="{{ route('dashboard') }}"
                class="block mt-5 px-4 py-3 rounded-xl
                bg-[#1ecad3]
                text-[#0f2a2c]
                font-semibold text-center">

                Dashboard

            </a>

        @endauth

    </div>

</nav>