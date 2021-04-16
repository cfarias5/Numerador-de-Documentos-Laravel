@extends('layouts.plantilla')

@section('title', 'Registrarse')

@section('content')

        <br>
            <h1 class="font-mono text-center text-3xl mb-2 mt-2">Programa para la generacion de Numeracion de Documentos</h1>
    </div>
    </div>
</header>
<div class="text-center">
    <div id="formulario" class="text-black bg-gray-100 text-left">
        <form class="bg-white w-full lg:w-1/2 mx-auto rounded-lg lg:my-20 px-4 py-4 shadow-lg" action="{{ route('insert')}}" method="post">
            @csrf
            <a href="{{ route('login')}}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
                Atras
            </a>
            <h3 class="font-mono mb-3 text-2xl font-bold text-blue-500 text-center">Registrarse</h3>
            @if (session('status1'))
                <div class=" font-mono">
                <h2 class="text-blue-500 ">{{ session('status1')}}</h2>
                </div>
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
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Nombres y Apellidos" id="forms-labelLeftInputCode" name="name" value="{{ old('name')}}"/>
              </div>
          </div>
          {!! $errors->first('name', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Email:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="email" placeholder="Email..." id="forms-labelLeftInputCode" name="email" value="{{ old('email')}}"/>
              </div>
          </div>
          {!! $errors->first('email', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Password:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="password" placeholder="Password..." id="forms-labelLeftInputCode" name="password" value="{{ old('password')}}"/>
              </div>
          </div>
          {!! $errors->first('password', '<small class="text-red-500">:message</small><br>') !!}
          <br>
          <div class="text-gray-700 md:flex md:items-center">
              <div class="mb-1 md:mb-0 md:w-1/5 text-left">
                <label for="forms-labelLeftInputCode" class="mb-3 text-xl font-semibold tracking-tight text-gray-800">Repetir Password:</label>
              </div>
              <div class="md:w-4/5 md:flex-grow">
                <input class="w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="password" placeholder="Repetir Password..." id="forms-labelLeftInputCode" name="password1" value="{{ old('password')}}"/>
              </div>
          </div>
          {!! $errors->first('password1', '<small class="text-red-500">:message</small><br>')!!}
            <br>
                <input type="submit" class=" w-full h-12 px-6 text-white transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-800 cursor-pointer" name="enviar" value="Registrarse">
            <br>
         </form>
    </div>
</div>
</body>
<br>

@endsection
