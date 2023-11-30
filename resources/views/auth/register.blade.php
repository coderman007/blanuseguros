<x-guest-layout>
    <div class="min-h-screen mx-auto flex flex-col items-center bg-[#EFF0F2] p-2 sm:p-10 lg:p-0">
        <x-validation-errors class="mb-4" />

        <div class="grid lg:grid-cols-2 justify-center m-auto rounded-lg overflow-hidden shadow-2xl lg:h-[650px] lg:w-4/5" style="background: rgb(22,48,81);
        background: linear-gradient(90deg, rgba(22,48,81,1) 0%, rgba(66,87,114,1) 100%);">
            <img src="{{ asset('images/carrusel/img3.jpg') }}" alt="logo" class="w-full h-full object-cover">
            <div>
            <form method="POST" action="{{ route('register') }}" class="p-1 md:p-10 lg:p-16 h-full flex flex-col justify-between">
            @csrf
                <div class="w-1/4 mx-auto">
                    <x-authentication-card-logo />
                </div>
                <div>
                    <div>
                        <x-label for="name" value="{{ __('Nombre') }}"  class="text-white"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Correo') }}" class="text-white"/>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" class="text-white"/>
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" class="text-white"/>
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2 text-white">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
                <hr class="mt-2">
                <x-sn-buttons />

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya registrado?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Registrarme') }}
                    </x-button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-guest-layout>
