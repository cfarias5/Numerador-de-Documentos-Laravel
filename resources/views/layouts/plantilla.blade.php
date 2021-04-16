<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body class=" bg-gray-100">
        <header>
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-0 navbar-expand-lg bg-blue-500 mb-0">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
              <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
                <a href="{{route('home')}}">
                <p class="text-sm font-bold leading-relaxed inline-block mr-4 py-1 whitespace-no-wrap uppercase text-white">
                NumeradorJC
                </p></a>
              </div>
            </div>
        </nav>
        <div id="cabecera">
            <div id="texto">
                <a title="logo"><img src="{{ asset('img/cabecera.png')}} " class=" w-full h-96" alt="logo"></a><br>
    @yield('content')
    <footer class="">
        <nav class="relative inset-x-0 bottom-0 flex-wrap items-center justify-between px-2 py-0 navbar-expand-lg bg-blue-500 mb-0">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
                <p class="text-sm font-bold leading-relaxed inline-block mr-2 py-1 whitespace-no-wrap uppercase text-white" href="#pablo">
                    NUMERADOR JC Desarrollado por Jennifer Torres &copy; 2020 - <?=date('Y')?> Contacto: 3103611930 Email: torresjennifer@hotmail.com
                </p>
            </div>
            <div class="lg:flex flex-grow items-center" id="example-navbar-warning">
                <ul class="flex flex-col lg:flex-row list-none ml-auto">
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#">
                    <img class="h-9 w-9" src="{{ asset('iconos/facebook.png')}}" alt="facebook">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#">
                    <img class="h-9 w-9" src="{{ asset('iconos/twitter.png')}}" alt="twitter">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#">
                    <img class="h-9 w-9" src="{{ asset('iconos/instagram.png')}}" alt="instagram">
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
</footer>
</body>
</html>
