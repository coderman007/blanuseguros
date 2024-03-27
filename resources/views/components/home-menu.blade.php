<nav x-data="{ open: false }" class="bg-[#304765]">
    <div class="flex justify-between h-16">
        <div class="shrink-0 flex items-center pl-6 ">
            <a href="{{ route('home') }}">
                <x-application-mark class="h-9 w-auto" />
            </a>
        </div>

        <!-- Enlaces de navegación -->
        <div class="flex items-center">
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="auth()->check() ? route('dashboard') : route('home')" :active="request()->routeIs('home')">
                    {{ __('Inicio') }}
                </x-nav-link>
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('Quiénes somos') }}
                </x-nav-link>
                <x-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                    {{ __('Nuestros servicios') }}
                </x-nav-link>
                <x-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>
                <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                    {{ __('Contacto') }}
                </x-nav-link>
            </div>
        </div>

        @auth
            <!-- Enlace al perfil del usuario -->
            <div class="hidden space-x-2 sm:-my-px sm:ml-10 sm:flex mr-6 items-center">
                <a href="{{ route('profile.show') }}">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                        class="w-10 h-10 rounded-full">
                </a>
                <!-- Botón de cierre de sesión -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                        class="text-[#D5D9DA] hover:text-white">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>
        @else
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex mr-6">
                <!-- Enlaces de inicio de sesión y registro -->
                <x-nav-link href="{{ route('login') }}" class="text-white hover:text-gray-300">
                    {{ __('Iniciar sesión') }}
                </x-nav-link>
                <x-nav-link href="{{ route('register') }}" class="btn-primary">
                    {{ __('Registrarse') }}
                </x-nav-link>
            </div>
        @endauth

        <div class="mr-2 flex items-center sm:hidden">
            <!-- Botón de hamburguesa -->
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="auth()->check() ? route('dashboard') : route('home')" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('Quiénes somos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                {{ __('Nuestros servicios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contacto') }}
            </x-responsive-nav-link>

            @auth
                <!-- Botón de cierre de sesión responsivo -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                        class="text-white hover:text-gray-300">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            @else
                <!-- Enlaces de inicio de sesión y registro responsivos -->
                <x-responsive-nav-link href="{{ route('login') }}" class="text-white hover:text-gray-300">
                    {{ __('Iniciar sesión') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" class="btn-primary">
                    {{ __('Registrarse') }}
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
