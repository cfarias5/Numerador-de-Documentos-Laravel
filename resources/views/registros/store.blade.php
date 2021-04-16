
@extends('layouts.plantilla')

@section('title', 'Numero de Radicado')

@section('content')
            <br>
            @auth
            @php
                $datos = Auth::user()->id;
            @endphp

            @include('includes.navbar');

            @endauth
            <h1 class="font-mono text-center text-3xl mb-2 mt-2">Programa para la generacion de Numeracion de Radicado de documentacion</h1>
            <h3 class="text-center font-sans">Se ha generado el numero de Radicado para su Documento</h3>
            <br>
        </div>
    </div>
</header>
<br>
<div>
    <div class="bg-white max-w-4xl lg:w-1/2 mx-auto overflow-hidden rounded-lg shadow-lg">
        <div class="px-6 py-4">
          <h4 class="mb-3 text-xl font-semibold tracking-tight text-gray-800">El numero de Radicado es: <strong>{{ $message->id}}</strong></h4>
          <p class="leading-normal text-gray-700"><strong>Fecha:</strong> {{ $message->fecha}}</p>
          <p class="leading-normal text-gray-700"><strong>Dependencia:</strong> {{ $message->equipo}}</p>
          <p class="leading-normal text-gray-700"><strong>El nombre de la persona que realiza el documento es:</strong> {{ $message->elabora}}</p>
          <p class="leading-normal text-gray-700"><strong>Firmado por:</strong> {{ $message->firma}}</p>
          <p class="leading-normal text-gray-700"><strong>Asunto:</strong> {{ $message->asunto}}</p>
          <p class="leading-normal text-gray-700"><strong>Temas Tratados:</strong> {{ $message->temas}}</p>
        </div>
    </div>
</div>
<div class="bg-white w-full lg:w-1/2 mx-auto rounded-lg lg:my-1 px-4 py-4 shadow-lg">
    <div class="flex flex-wrap space-x-3 items-center">
    <a href="{{ route('login')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Atras
    </a>
    </div>
</div>
</body>
<br><br><br>

@endsection
