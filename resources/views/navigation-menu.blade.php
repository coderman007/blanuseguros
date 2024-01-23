<nav x-data="{ open: false }" class="bg-white border-b" style="background: rgb(22,48,81);
background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="auth()->check() ? route('dashboard') : route('home')" :active="request()->routeIs('home')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/users" :active="request()->routeIs('users')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="companies" :active="request()->routeIs('companies')">
                        {{ __('Compañías') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="lines" :active="request()->routeIs('lines')">
                        {{ __('Ramos') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="plans" :active="request()->routeIs('plans')">
                        {{ __('Planes') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="holders" :active="request()->routeIs('holders')">
                        {{ __('Titulares') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="policies" :active="request()->routeIs('policies')">
                        {{ __('Pólizas') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="auth()->check() ? route('dashboard') : route('home')" :active="request()->routeIs('home')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('companies') }}" :active="request()->routeIs('companies')">
                {{ __('Compañías') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('lines') }}" :active="request()->routeIs('lines')">
                {{ __('Ramos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('plans') }}" :active="request()->routeIs('plans')">
                {{ __('Planes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('holders') }}" :active="request()->routeIs('holders')">
                {{ __('Titulares') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('policies') }}" :active="request()->routeIs('policies')">
                {{ __('Pólizas') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
