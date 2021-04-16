@extends('layouts.plantilla')

@section('title', 'Numerador de Actas')

@section('content')
            <br>
            <h1 class="font-mono text-center text-3xl mb-2 mt-2">Programa para la generacion de Numeracion de Radicado de documentacion</h1>
            <h3 class="text-center font-sans">Por favor Ingrese a la Plataforma o registrese para generar radicado de la Documentacion</h3>
            <br>
        </div>
    </div>
</header>
<br>
<div class="text-center">
            <div class="inline-flex" role="group" aria-label="Button group">
                <a href="{{ route('login')}}" class="h-10 px-4 m-2 pt-2 text-center text-white transition-colors duration-150 bg-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-800 cursor-pointer" name="enviar">Login</a>
                <a href="{{ route('create')}}" class="h-10 px-4 m-2 pt-2 text-center text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-800 cursor-pointer" name="enviar">Registrarse</a><br>
            </div>
</div>
</body>
<br><br>
@endsection
