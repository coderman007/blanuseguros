<x-guest-layout>
   
    <div class="container mx-auto mt-8">
        <div class="p-5 text-center bg-[#2C425F] text-white mb-4">
            <h5 class="mb-2 text-3xl font-bold tracking-tight">{{ $line->name }}</h5>
        </div>
        <div class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow-lg shadow-gray-500 dark:bg-gray-800 dark:border-gray-700">
            <img src="{{ asset('storage/' . $line->image) }}" alt="Imagen de {{ $line->name }}"
                class="w-full h-64 object-cover rounded-t-lg">
            
            <div class="p-5">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $line->description }}</p>
            </div>
        </div>
    </div>
</x-guest-layout>
