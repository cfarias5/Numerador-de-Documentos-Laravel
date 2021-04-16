<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radicado Documento</title>
</head>
<body>
    <h1 class="text-sm font-bold leading-relaxed inline-block mr-4 py-1 whitespace-no-wrap uppercase text-white">Numerador JC</h1><br>
    <p>Usted ha generado la numeracion para el documento...</p><br>
    <p class="font-sans font-xl">Numero Acta: {{ $msg->id}}</p>
    <p class="text-center font-sans">Fecha: {{ $msg->fecha}}</p>
    <p class="text-center font-sans">Dependencia: {{ $msg->equipo}}</p>
    <p class="text-center font-sans">Dependencia: {{ $msg->equipo}}</p>
    <p class="text-center font-sans">El nombre de la persona que realiza el documento es: {{ $msg->elabora}}</p>
    <p class="text-center font-sans">Documento firmado por: {{ $msg->firma}}</p>
    <p class="text-center font-sans">Asunto: {{ $msg->asunto}}</p>
    <p class="text-center font-sans">Temas Tratados: {{ $msg->temas}}</p>
</body>
</html>
