<div>
  <x-guest-layout>

    <div class="bg-gray-300 w-4/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
      Descubre ¿Quienes somos?
    </div>

    <div id="default-carousel" class="relative w-4/6 mx-auto" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{asset('images/carrusel/img1.jpg')}}"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{asset('images/carrusel/img2.jpg')}}"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{asset('images/carrusel/img3.jpg')}}"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{asset('images/carrusel/img1.jpg')}}"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{asset('images/carrusel/img2.jpg')}}"
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
      </div>
      <!-- Slider controls -->
      <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 1 1 5l4 4" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 9 4-4-4-4" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
    <div class="w-3/6 mx-auto grid grid-cols-2 my-20 gap-x-6">
        <div>
            <div class="font-semibold text-4xl">Mision</div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem sit pariatur animi molestias, nemo quia error ad sint, minus suscipit quae doloribus, beatae cum ipsum exercitationem. Recusandae maxime maiores eaque?
            </div>
        </div>
        <div>
            <div class="font-semibold text-4xl">Vision</div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem sit pariatur animi molestias, nemo quia error ad sint, minus suscipit quae doloribus, beatae cum ipsum exercitationem. Recusandae maxime maiores eaque?
            </div>
        </div>
    </div>
    <div class="w-3/6 mx-auto mt-10 mb-20">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos similique officia consectetur esse itaque voluptates quaerat sed dolore iusto quisquam ea libero assumenda, reprehenderit ipsa vitae soluta sint dolores eveniet.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat molestias exercitationem ad dolorum reiciendis necessitatibus ullam nesciunt. Cum, debitis. Odio quia quos iusto ipsum aliquid mollitia harum nulla temporibus illum.Laudantium ipsam, doloremque omnis suscipit necessitatibus quo ex quos tempora culpa iusto quisquam, blanditiis adipisci ducimus, autem dicta veniam quibusdam? Amet perspiciatis quo accusantium esse, dicta quaerat ut reprehenderit libero.
    </div>
    <div>
        <div class="bg-gray-300 w-2/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
            Aliados
        </div>
        <div class="w-4/6 mx-auto grid grid-cols-3 gap-x-20 gap-y-10">
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
            <div class="bg-gray-300 px-3 py-6 rounded-lg">
                <img src="{{asset('images/lines/auto.jpeg')}}" alt="" class="w-80 rounded-md mx-auto">
                <div class="text-center my-2 font-semibold bg-slate-600 w-fit mx-auto text-gray-100 py-1 px-2 rounded-md">Nombre del aliado</div>
                <div class="px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quo ad! Cumque provident nam nihil officia laboriosam.
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
  </x-guest-layout>
</div>
