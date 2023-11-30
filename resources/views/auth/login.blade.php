<x-guest-layout>
    <div class="min-h-screen mx-auto flex flex-col items-center bg-[#EFF0F2] p-2 sm:p-10 lg:p-0">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="grid lg:grid-cols-2 justify-center m-auto rounded-lg overflow-hidden shadow-2xl lg:h-[600px] lg:w-4/5" style="background: rgb(22,48,81);
            background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
            <img src="{{ asset('images/carrusel/img2.webp') }}" alt="logo" class="w-full h-full object-cover">
            <div>
                <form method="POST" action="{{ route('login') }}" class="p-1 md:p-10 lg:p-16 h-full flex flex-col gap-y-5">
                    @csrf
                    <div class="w-1/4 mx-auto">
                        <x-authentication-card-logo />
                    </div>
                    <div>
                        <div>
                            <x-label for="email" value="{{ __('Correo') }}" class="text-white"/>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <div>
                            <x-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>
                        <x-validation-errors class="mb-4" />

                        <div class="mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-white">{{ __('Recuérdame') }}</span>
                            </label>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <x-sn-buttons />
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-white hover:text-[#be823d] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        <x-button class="ml-4">
                            {{ __('Iniciar sesión') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
