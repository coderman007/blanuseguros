<x-guest-layout>
    <div class="min-h-screen mx-auto flex flex-col items-center bg-[#EFF0F2] p-2 sm:p-10 lg:p-0">
        <x-validation-errors class="mb-4" />


        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <div class="grid lg:grid-cols-2 justify-center m-auto rounded-lg overflow-hidden shadow-2xl lg:h-[500px] lg:w-4/6 bg-white">
            <img src="{{ asset('images/logo.jpeg') }}" alt="logo" class="w-full h-full">
            <div>
                <form method="POST" action="{{ route('password.email') }}" class="p-1 md:p-10 lg:p-16 h-full flex flex-col justify-between">
                    @csrf
                    <div>
                        <x-authentication-card-logo />
                    </div>

                    <div class="mb-4 text-lg text-gray-600">
                        {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
                    </div>

                    <div class="block">
                        <x-label for="email" value="{{ __('Correo') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Enviar enlace') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
