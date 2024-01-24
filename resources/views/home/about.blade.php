<div>
  <x-guest-layout>

    <!-- Sección de presentación -->
    <div class="bg-gray-300 w-4/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
      ¿Quiénes somos?
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
          <span class="sr-only">Anterior</span>
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
          <span class="sr-only">Siguiente</span>
        </span>
      </button>
    </div>

    <!-- Reseña de AnuskinaSeguros -->
    <div class="w-3/6 mx-auto my-10">
      <div class="font-semibold text-4xl mb-4">Descubre más sobre AnuskinaSeguros</div>
      <p>
        AnuskinaSeguros es una compañía dedicada a proporcionar soluciones de seguros confiables y accesibles para
        nuestros clientes. Nuestra misión es proteger a nuestros asegurados y sus activos, brindando tranquilidad y
        seguridad financiera en cada paso del camino.
      </p>
      <p>
        Nos esforzamos por ser líderes en el mercado de seguros en Colombia, destacándonos por la excelencia en el
        servicio al cliente y la innovación constante en nuestros productos. Con una sólida experiencia y
        profesionalismo, nos comprometemos a ser la mejor elección para aquellos que buscan proteger lo que más valoran.
      </p>
    </div>
    <!-- Misión y Visión -->
    <div class="w-3/6 mx-auto grid grid-cols-2 my-20 gap-x-6">
      <div>
        <div class="font-semibold text-4xl">Misión</div>
        <div>
          Ofrecer seguros confiables y accesibles que protejan a nuestros clientes y sus activos, brindando tranquilidad
          y seguridad financiera.
        </div>
      </div>
      <div>
        <div class="font-semibold text-4xl">Visión</div>
        <div>
          Ser la compañía líder en el mercado de seguros en Colombia, reconocida por su excelencia en servicio al
          cliente y productos innovadores.
        </div>
      </div>
    </div>

    <!-- Compromiso con el cliente -->
    <div class="w-3/6 mx-auto mt-10 mb-20">
      Estamos comprometidos con la satisfacción de nuestros clientes, ofreciendo soluciones de seguros adaptadas a sus
      necesidades específicas. Nuestra experiencia y profesionalismo nos convierten en la mejor elección para proteger
      lo que más valoran.
    </div>
    <!-- Sección de Aliados -->
    <div>
      <div class="bg-gray-300 w-3/5 mx-auto text-center my-6 rounded-md text-gray-700 text-4xl font-bold py-3">
        Aliados
      </div>
      <div class="w-4/6 mx-auto grid grid-cols-1 md:grid-cols-3 gap-x-2 gap-y-10">
        @foreach ($insuranceCompanies as $company)
        <div class="bg-gray-300 px-3 py-6 rounded-lg flex flex-col items-center">
          <!-- Imagen del aliado -->
          <img src="{{ asset('storage/' . $company->image) }}" alt="Imagen de {{ $company->name }}"
            class="w-full h-40 object-cover rounded-t-lg">
          <div class="flex flex-col items-left mt-4">
            <!-- Enlace al sitio web del aliado -->
            <p><a href="{{$company['url']}}" target="_blank" class="text-blue-500">{{$company['url']}}</a></p>
            <!-- Información de contacto del aliado -->
            <p><strong>Dirección:</strong> {{$company['address']}}</p>
            <p><strong>Teléfono:</strong> {{$company['phone']}}</p>
            <p><strong>Email:</strong> <a href="mailto:{{$company['email']}}">{{$company['email']}}</a></p>
          </div>
          <!-- Botón de contacto con soporte técnico -->
          <button class="bg-blue-500 text-white py-2 px-4 mt-4 rounded-full hover:bg-blue-700">Contáctanos</button>
        </div>
        @endforeach
      </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
  </x-guest-layout>
</div>