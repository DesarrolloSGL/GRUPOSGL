@extends('layouts.app')

@section('content')
  <section class="">
    <div class="w-fit mx-auto grid grid-cols-1 xl:gap-1 md:grid-cols-2 lg:grid-cols-3">
      <div class="relative">
        <div class="absolute px-10 top-10">
          <h3 class="text-sm text-white font-bold mb-5">Nuestro Inicios</h3>
          <p class="mt-4 lg:mt-0 text-justify text-xs text-white">
            Fundada por nuestro CEO Alexander
            Galindo en Abril del año 2015
            con la idea de desarrollar servicios logísticos a escala internacional que acerquen el comercio en la
            región Centroamericana y del Caribe,
            desarrollando Hubs logísticos en las principales ciudades del mundo.
            Garantizando con esto una certeza jurídica para todos nuestros usuarios.
          </p>
        </div>
        <img src="{{asset('images/footer/nuestros_inicios.png')}}" alt="">
      </div>
      <div class="relative">
        <div class="absolute px-10 bottom-10">
          <img class="w-7 h-7" src="{{asset('images/footer/Icono Modalidad.png')}}" alt="">
          <h3 class="text-sm text-white font-bold mb-5">Modalidad de Trabajo</h3>
          <p class="mt-4 lg:mt-0 text-justify text-xs text-white">
            La modalidad de trabajo que adopta Grupo
            SGL es principalmente la de OOC (Own Operator Forwarder) una idea basada en servicios con la mínima
            participación de terceros en cada traslado que garantiza la viabilidad, confianza y sobre todo la
            reducción de costos marginales para el cliente final, por su enfoque en la reducción de manejo y
            optimizando las rutas directas con servicios seleccionados que acercan de manera inmediata los mercados
            principales.
          </p>
          <a href="https://wa.me/50232220185" target="_blank">
            <div class="relative my-5">
                <button class="px-3 py-1 mx-auto rounded-full bg-white text-blue-700 flex items-center">
                  <img class="w-6 h-6 mr-2" src="{{asset('images/footer/WhatsApp Azul.png')}}" alt="">
                  Contacta a un Asesor
                </button>
            </div>
          </a>
        </div>
        <img src="{{asset('images/footer/modalidad_de_trabajo.png')}}" alt="">
      </div>
      <div class="relative">
        <div class="absolute px-10 bottom-10">
          <img class="w-7 h-7" src="{{asset('images/footer/Icono Ideología.png')}}" alt="">
          <h3 class="text-sm text-white font-bold mb-5">Nuestra ideología</h3>
          <p class="mt-4 lg:mt-0 text-justify text-xs text-white">
            Nuestra ideología principal de servicio
            se cimento desde los inicios en la satisfacción continua de nuestros clientes por medio de sistemas de
            gestión de calidad y seguridad que nos hagan mantener una mejora continua en la cual no solo nuestros
            clientes externos se sientan importantes y acogidos con servicios de calidad sino también nuestros
            clientes internos quienes cada día optimizan y mejoran sus tareas en favor del bien común.
          </p>
          <a href="https://wa.me/50232220185" target="_blank">
            <div class="relative my-5">
                <button class="px-3 py-1 mx-auto rounded-full bg-white text-blue-700 flex items-center">
                  <img class="w-6 h-6 mr-2" src="{{asset('images/footer/WhatsApp Azul.png')}}" alt="">
                  Contacta a un Asesor
                </button>
            </div>
          </a>
        </div>
        <img src="{{asset('images/footer/nuestra_ideologia.png')}}" alt="">
      </div>
    </div>
    <div class="w-fit mx-auto my-1">
      <div class="relative">
        <div class="absolute bottom-[40%] flex">
          <div class="hidden text-center px-5 w-5/12 my-auto mx-auto text-lg text-white rounded-lg md:block">
            "Nacimos como una empresa joven y progresista que busca en la diversidad la perfección de nuestros estándares"
          </div>
        </div>
        <img src="{{asset('images/footer/footer.png')}}" alt="">
      </div>
    </div>
  </section>
@endsection