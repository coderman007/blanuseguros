<x-guest-layout>
    <section class="px-4 space-y-6 bg-slate-300 py-8 dark:bg-transparent md:py-12 lg:py-20">
        <div>
            <div class="mx-auto text-center">
                <div class="max-w-[58rem] mx-auto flex flex-col items-center space-y-4">
                    <h2 class="font-bold text-5xl leading-[1.1] text-[#183252] sm:text-6xl md:text-7xl">Descubre
                        Nuestros
                        Servicios de Seguros</h2>

                    <p class="max-w-[85%] mx-auto leading-normal text-muted-foreground sm:text-2xl sm:leading-7 pb-6">
                        Brindamos servicios personalizados que se adaptan a tus necesidades. Tu seguridad es nuestra
                        prioridad.
                    </p>
                </div>
            </div>

            <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">


                @if ($lines->count() > 0)
                @foreach ($lines as $line)
                <div
                    class="relative overflow-hidden rounded-lg border bg-white hover:bg-blue-100 transition-all duration-300 select-none hover:shadow hover:shadow-blue-900 p-2">
                    <div class="flex h-[400px] flex-col justify-between rounded-md p-4">
                        <a href="#">
                            <img src="{{ asset('storage/' . $line->image) }}" alt="{{ $line->name }}"
                                class="w-full h-40 object-cover rounded-t-lg">
                            <div class="space-y-2">
                                <h3 class="font-bold text-[#183252] text-2xl">{{$line->name}}</h3>
                                <p class="text-md text-muted-foreground">{{$line->description}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
    </section>
</x-guest-layout>