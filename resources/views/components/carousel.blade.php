<div>
    <!-- Carrusel de imágenes -->
    <div class="container mx-auto mt-8 slick-carousel">
        <div><img src="{{ asset('images/carrusel/img1.jpg') }}" alt="Img1" class="object-cover w-full h-96"></div>
        <div><img src="{{ asset('images/carrusel/img2.jpg') }}" alt="Img2" class="object-cover w-full h-96"></div>
        <div><img src="{{ asset('images/carrusel/img3.jpg') }}" alt="Img3" class="object-cover w-full h-96"></div>
    </div>
    <script>
        // Inicialización del carrusel 
        $('.slick-carousel').slick({
            autoplay: true
            , dots: true
            , arrows: true
            , infinite: true
            , speed: 500
            , fade: true
            , cssEase: 'linear'
        });

    </script>
</div>
