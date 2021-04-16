@extends('layouts.plantilla')

@section('title', 'Actualizar')

@section('content')
        @auth
        @php
            $datos = Auth::user()->id;
        @endphp

        @include('includes.navbar');

        @endauth
        <br>
            <h1 class="font-mono text-center text-3xl mb-2 mt-2">Actualice sus Datos</h1>
    </div>
    </div>
</header>
<div class="text-center">
    <div id="formulario" class="text-black bg-gray-100 text-left">
        <form method="POST" class="bg-white w-full lg:w-1/2 mx-auto rounded-lg lg:my-1 px-4 py-4 shadow-lg" action="{{ route('update', $User)}}" enctype="multipart/form-data" >
            @method('patch')
            @csrf
            <h3 class="font-mono mb-3 text-2xl font-bold text-blue-500 text-center">Actualizar Datos</h3>
            @if (session('status3'))
                <div class=" font-mono">
                <h2 class="text-blue-500 ">{{ session('status3')}}</h2>
                </div>
            @endif
              <div class=" font-mono">
              </div>
              <br>

            <div class="overflow-hidden">
                <div class="py-3 left mx-auto float-left w-1/2">
                    <div class="bg-white px-4 py-5 text-center w-48">
                      <div class="mb-4">
                        <img class="w-auto mx-auto rounded-full object-cover object-center" src="/laravel/acta/public/uploads/{{Auth::user()->avatar}}" alt="Avatar Upload" />
                      </div>
                      <label class="cursor-pointer mt-6">
                        <span class="mt-2 text-sm leading-normal px-4 py-2 bg-blue-500 text-white text-xs rounded-full" >Cambiar</span>
                        <input type='file' class="hidden" :multiple="multiple" :accept="accept" name="avatar"/>
                      </label>
                    </div>
                </div>
                <div class="w-1/2 cont-reloj text-right float-right">
                  <h3 class="pt-16 font-sans mb-3 text-xl font-semibold tracking-tight text-gray-800">Fecha y Hora:</h3>
                      <div class="reloj font-sans text-blue-500" id="reloj"></div>
                      <div class="datos font-sans text-blue-500">
                          <span id="fec_Datos"></span>
                      </div>
                  </div>
            </div>
                <br>
                @if (session('error'))
                    <div class=" font-mono">
                    <h2 class="text-red-500 ">{{ session('error')}}</h2>
                    </div>
                    <br>
                @endif
            <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Nombre:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" value="{{ $User->name}}" id="forms-labelLeftInputCode" name="name"/>
              </div>
          </div>
          {!! $errors->first('name', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Email:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="email" value="{{ $User->email}}" id="forms-labelLeftInputCode" name="email"/>
              </div>
          </div>
          {!! $errors->first('email', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Password:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="password" placeholder="Password..." id="forms-labelLeftInputCode" name="password"/>
              </div>
          </div>
          {!! $errors->first('password', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Repetir Password:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="password" id="forms-labelLeftInputCode" name="password1" placeholder="Repetir Password"/>
              </div>
          </div>
          {!! $errors->first('password1', '<small class="text-red-500">:message</small><br>') !!}
          <br>
            <input type="submit" class=" w-full h-12 px-6 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-800 cursor-pointer" name="enviar" value="Actualizar"/>
        <br>
         </form>
         <form action="{{ route('destroy', $User)}}"method="POST" class="bg-white w-full lg:w-1/2 mx-auto rounded-lg lg:my-1 px-4 py-4 shadow-lg">
                @method('DELETE')
                @csrf
                <div class="flex flex-wrap space-x-3 items-center">
                <a href="{{ route('login')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                    Atras
                </a>
                <button class="bg-red-500 px-4 py-2 font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-red-600">
                    <span>
                        <img class="h-4 w-4 fill-current" src="{{ asset('iconos/delete.svg')}}" alt="delete">
                    </span>
                    <span>
                        Delete
                    </span>
                </button>
                <p class="font-mono text-red-500">Borrar Cuenta de Usuario</p>
            </form>
        </div>
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
              </script>
</body>
<br>

@endsection
