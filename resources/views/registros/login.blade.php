@extends('layouts.plantilla')

@section('title', 'Numerador de Actas')

@section('content')
            @auth
            @php
                $datos = Auth::user()->id;
            @endphp

            @include('includes.navbar');

            @endauth
            <h1 class="font-mono text-center text-3xl mb-2 mt-2">Control Documentacion</h1>
            @if (session('status5'))
                <div class="bg-white w-full lg:w-1/3 mx-auto rounded-lg lg:my-20 px-4 py-4 shadow-lg">
                    <div class=" font-mono">
                        <h2 class="text-red-500 ">{{ session('status5')}}</h2>
                    </div>
                    <br>
            @endif
            @if (session('status2'))
                    <div class=" font-mono">
                        <h2 class="text-red-500 ">{{ session('status2')}}</h2>
                    </div>
                    <br>
                </div>
            @endif
            </div>
            @guest
            <h3 class="text-center font-sans">Por favor Ingrese a la Plataforma para generar radicado de la Documentacion</h3>
            @else
            <h3 class="text-center font-sans font-xl">Con este formulario se va a generar un numero de radicado para cualquier tipo de documento.</h3>
            <h2 class="text-center font-sans">Diligencia el siguiente Formulario</h2><br>
            @endguest
        </div>
    </div>
</header>
@guest
<div class="bg-white w-full lg:w-1/3 mx-auto rounded-lg lg:my-20 px-4 py-4 shadow-lg">
    <a href="{{ route('home')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Atras
    </a>
    <form action="{{ route('index')}}" method="post">
        @csrf
        <br><label for="" class=" font-mono text-center"><h2 class="text-blue-500 text-2xl font-bold">Ingresa al Sistema</h2></label><br>
        @if ($errors->any())
            @foreach ($errors->all() as $error )
           <p class="text-red-500">{{ $error }}</p><br>
            @endforeach
        @endif
        <input type='text' required autofocus value="{{ old('email')}}" placeholder="Email"
            class="w-full mb-3 px-4 py-3 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" name="email"/>
        <input type='password' required placeholder="Password"
            class="w-full mb-3 px-4 py-3 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" name="password"/>
        <input type="submit" class="w-full h-12 px-6 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-800 cursor-pointer" value="Ingresar">
    </form>
</div>
@else
    <div id="formulario" class="text-black bg-gray-100 text-left">
          <form class="bg-white w-full lg:w-1/2 mx-auto rounded-lg lg:mb-10 px-4 py-4 shadow-lg" action="{{ route('store')}}" method="post">
            @csrf
            <h3 class="font-mono mb-3 text-2xl font-bold text-blue-500 text-center">Formulario</h3><br>
              @if (session('status'))
                <div class=" font-mono">
                <h2 class="text-blue-500 ">{{ session('status')}}</h2>
                </div>
                <br>
              @endif
              <h3 class="font-sans mb-3 text-xl font-semibold tracking-tight text-gray-800">Fecha y Hora:</h3>
              <div class="cont-reloj">
						<div class="reloj" id="reloj"></div>
						<div class="datos">
							<span id="fec_Datos"></span>
						</div>
						</div>

						<script>

						let mostraHora=()=>{
							let reloj=document.getElementById('reloj')
							let fechadato=document.getElementById('fec_Datos')
							let dias=['Lunes','martes','miercoles','jueves','viernes','sabado','domingo']
							let meses=['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre']
							let fechaHora=new Date()
							let hora=fechaHora.getHours()
							let minutos=fechaHora.getMinutes()
							let segundos=fechaHora.getSeconds()
							let dia=fechaHora.getDate()
							let mes=fechaHora.getMonth()
							let ano=fechaHora.getUTCFullYear()
							let m=meses[mes]
							let hr=(hora>12) ? hora-12 : hora
							let am =(hora>12) ? 'PM' : 'AM'
							if(hr<10){hr='0' + hr}
							if(minutos<10){minutos='0' + minutos}
							if(segundos<10){segundos='0' + segundos}
							reloj.textContent=`${hr}:${minutos}:${segundos} ${am}`

							fechadato.textContent=`${dia} de ${m} del ${ano}`
						}
						setInterval(mostraHora, 1000)

						</script><br>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                  <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-sans font-semibold tracking-tight text-gray-800">Email:</label>
                </div>
                <div class="md:w-4/5 md:flex-grow">
                  <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="email" placeholder="Email..." id="forms-labelLeftInputCode" name="email" value="{{ old('email')}}"/>
                </div>
            </div>
            {!! $errors->first('email', '<small class="text-red-500">:message</small><br>') !!}<br>
            <h3 class="font-sans mb-3 text-xl font-semibold tracking-tight text-gray-800">Equipo:</h3>
            <select class="w-1/2 h-9 bg-gray-200 pl-4 pr-4 border rounded-lg appearance-none" name="dependencia" value="{{ old('dependencia')}}">
                    <optgroup>
                        <option>Departamento</option>
                        <option value="Opcion 1">Opcion 1</option>
                        <option value="Opcion 2">Opcion 2</option>
                        <option value="Opcion 3">Opcion 3</option>
                        <option value="Opcion 4">Opcion 4</option>
                        <option value="Opcion 5">Opcion 5</option>
                        <option value="Opcion 6">Opcion 6</option>
                        <option value="Opcion 7">Opcion 7</option>
                        <option value="Opcion 8">Opcion 8</option>
                    </optgroup>
            </select><br>
            {!! $errors->first('dependencia', '<small class="text-red-500">:message</small><br>') !!}<br>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                  <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Elabora:</label>
                </div>
                <div class="md:w-4/5 md:flex-grow">
                  <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Nombre de la persona que elabora el documento" id="forms-labelLeftInputCode" name="elabora" value="{{ old('nombre')}}"/>
                </div>
            </div>
            {!! $errors->first('elabora', '<small class="text-red-500">:message</small><br>') !!}<br>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                  <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Firma:</label>
                </div>
                <div class="md:w-4/5 md:flex-grow">
                  <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Nombre de la persona que firma el documento" id="forms-labelLeftInputCode" name="firma" value="{{ old('jefe')}}"/>
                </div>
            </div>
            {!! $errors->first('firma', '<small class="text-red-500">:message</small><br>') !!}<br>
            <h3 class="font-sans mb-3 text-xl font-semibold tracking-tight text-gray-800">Tipo de Documento:</h3>
               <select name="tipo" class="w-1/2 h-9 bg-gray-200 pl-4 pr-4 border rounded-lg appearance-none" value="{{ old('tipo')}}">
                    <optgroup>
                        <option>Documentos</option>
                        <option value="Opcion 1">Opcion 1</option>
                        <option value="Opcion 2">Opcion 2</option>
                    </optgroup>
                </select><br>
                {!! $errors->first('tipo', '<small class="text-red-500">:message</small><br>') !!}<br>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/3">
                    <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Asunto:</label>
                </div>
                <div class="md:w-2/3 md:flex-grow">
                    <textarea class="w-full h-24 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" name="asunto" value="{{ old('asunto')}}"></textarea>
                </div>
            </div>
            {!! $errors->first('asunto', '<small class="text-red-500">:message</small><br>') !!}<br>
            <div class="text-gray-700 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/3">
                    <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Temas Tratados:</label>
                </div>

                <div class="md:w-2/3 md:flex-grow">
                    <textarea class="w-full h-24 px-3 py-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" name="temas" value="{{ old('temas')}}"></textarea>
                </div>
            </div>
            {!! $errors->first('temas', '<small class="text-red-500">:message</small><br>') !!}
            <br>
                <input type="submit" class="w-full h-12 px-6 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-800 cursor-pointer" name="enviar" value="Generar Radicado"><br>
           </form>
      </div>
</body>
@endguest
@endsection
