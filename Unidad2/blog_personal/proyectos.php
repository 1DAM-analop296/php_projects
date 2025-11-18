<?php

$dir="./PHPBasico/Respuestas";
$contador=0;

$archivos=scandir($dir);
      foreach($archivos as $archivos){
         $contador

      }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="/src/style.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <?php require "Header.php"; ?>
   <div class="m-4 flex flex-col items-center w-auto">
    <h3 class="text-2xl font-bold text-red-600">Actividad 1</h3>
        <table class="border-2 mt-4">
            <tr class="border-2 p-3">
               <th class="border-2 p-3">Ejercicios</th>
               <th class="border-2 p-3">Descripción</th>
               <th class="border-2 p-3">Enlace</th>
            </tr>
            <tr class="border-2 p-3 ">
               <td class="border-2 p-3">Ejercicio 1</td>
               <td class="border-2 p-3 text-center">Una página web que muestre la fecha actual en castellano</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio1.php" class="hover:text-blue-700">Ejercicio Hora</a></td>
            </tr>
            <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 2</td>
               <td class="border-2 p-3 text-center">Mostrar en pantalla una tabla de 10 por 10 con los números del 1 al 100</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio2.php" class="hover:text-blue-700">Ejercicio Numeros</a></td>
            </tr>
             <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 3</td>
               <td class="border-2 p-3 text-center">Un programa que tenga un formulario donde el usuario indica su nombre y su edad</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio3.php" class="hover:text-blue-700">Ejercicio Nombre y Edad</a></td>
            </tr>
             <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 4</td>
               <td class="border-2 p-3 text-center">Un programa que solicite al usuario su salario mensual en bruto y la retención que tiene aplicada</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio4.php" class="hover:text-blue-700">Ejercicio Salario</a></td>
            </tr>
             <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 5</td>
               <td class="border-2 p-3 text-center">Un formulario con un campo de texto en el que puedas escribir números</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio5.php" class="hover:text-blue-700"> Ejercicio Numeros</a></td>
            </tr>
             <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 6</td>
               <td class="border-2 p-3 text-center">Un script PHP que genere un número aleatorio entre 1 y 10, simulando una nota numérica</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio6.php" class="hover:text-blue-700">Ejercicio Aleatorios</a></td>
            </tr>
             <tr class="border-2">
               <td class="border-2 p-3">Ejercicio 7</td>
               <td class="border-2 p-3 text-center">Un script PHP que solicite un texto y haciendo uso del bucle for</td>
               <td class="border-2 p-3 text-center"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/PHPBasico/Ejercicio7.php" class="hover:text-blue-700">Ejercicio solicitar texto</a></td>
            </tr>
</div>
</html>