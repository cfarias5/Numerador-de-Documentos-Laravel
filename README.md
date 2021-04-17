<h1>Numerador de Documentos</h1>

<p>Programa que le permite numerar sus documentos de forma automatica guardando los aspectos principales del mismo documento como el asunto los temas tratados en el documento, quien realiza el documento y quien finalmente lo firma para llevar una trazabilidad completa y funcional de la documentacion en su compania</p>

<h2>Pagina Inicial</h2>

<img width="1486" alt="Screen Shot 2021-04-17 at 12 21 29" src="https://user-images.githubusercontent.com/80476901/115121292-7a7eff80-9f77-11eb-9bbb-5ddcba187299.png">

Aqui debemos registrarnos inicialmente luego de estar registrados realizamos el login que nos permite ingresar a la pagina principal de nuestro programa

<img width="1307" alt="Screen Shot 2021-04-17 at 12 23 27" src="https://user-images.githubusercontent.com/80476901/115121323-b9ad5080-9f77-11eb-854d-9c6122c4639d.png">

Esta es la ventana de registro realizamos todo el proceso y quedamos registrados guardando los datos en la base de datos de la pagina web. datos guardados en MYSQL.

<img width="1307" alt="Screen Shot 2021-04-17 at 12 25 49" src="https://user-images.githubusercontent.com/80476901/115121384-114bbc00-9f78-11eb-92f6-c6eb76902c5c.png">

Luego de hacer el registro y habernos logueado correctamente podemos ingresar todos los datos principales del documento y al dar click en el boton generar radicado nos envia un email y nos guarda todo los datos de documento en la base de datos.

<h1>Notas Importantes para la instalacion</h1>

La pagina web esta hecha en laravel, al momento de descargarla debemos realizar los siguientes pasos:

1. debemos manejar el framework laravel
2. crear una base de datos mysql en el caso de esta pagina web esta por defecto la base de datos "documentacion".
3. se deben correr las migraciones con el comando php artisan migrate en el terminal de la aplicacion en la carpeta de su aplicacion.
4. para tener el avatar en los registros debemos colocar la ruta que hayamos hecho en el archivo navbar en la carpeta resources/views/includes/navbar.blade.php para que el avatar que se actualice en la edicion del registro.

<img width="1397" alt="Screen Shot 2021-04-17 at 12 37 29" src="https://user-images.githubusercontent.com/80476901/115121767-098d1700-9f7a-11eb-8f53-910ceb7142eb.png">

6. empezar a usar este programa.

En caso de errores es bueno comentarlos con el fin de ir mejorando.

Les agradezco el apoyo espero que les guste mi desarrollo y cualquier siuacion que necesiten no duden en escribir.

CESAR ARIAS JC
