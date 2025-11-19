<?php
$proyectos= array(
    array(
        "nombre"=>"Ejercicio 1",
        "descripcion"=>"Una página web que muestre la fecha actual en castellano",
        "enlace"=>"../PHPBasico/Ejercicio1.php",
    ),
    array(
        "nombre"=>"Ejercicio 2",
        "descripcion"=>"Mostrar en pantalla una tabla de 10 por 10 con los números del 1 al 100",
        "enlace"=>"../PHPBasico/Ejercicio2.php",
    ),
    array(
        "nombre"=>"Ejercicio 3",
        "descripcion"=>"Un programa que tenga un formulario donde el usuario indica su nombre y su edad",
        "enlace"=>"../PHPBasico/Ejercicio3.php",
    ),
    array(
        "nombre"=>"Ejercicio 4",
        "descripcion"=>"Un programa que solicite al usuario su salario mensual en bruto y la retención que tiene aplicada",
        "enlace"=>"../PHPBasico/Ejercicio4.php",
    ),
    array(
        "nombre"=>"Ejercicio 5",
        "descripcion"=>"La programación es el proceso de crear un conjunto de instrucciones, escritas en un lenguaje de programación, para que una computadora realice tareas específicas.",
        "enlace"=>"../PHPBasico/Ejercicio5.php",
    ),
    array(
        "nombre"=>"Ejercicio 6",
        "descripcion"=>"Un formulario con un campo de texto en el que puedas escribir números",
        "enlace"=>"../PHPBasico/Ejercicio6.php",
    ),
    array(
        "nombre"=>"Ejercicio 7",
        "descripcion"=>"Un script PHP que solicite un texto y haciendo uso del bucle for.",
        "enlace"=>"../PHPBasico/Ejercicio7.php",
    ),
   );  

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
            <?php
               $dir="../PHPBasico/";
               $archivos=scandir($dir);
               foreach($archivos as $archivo){
                  $existe=false;
               $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                  if ($extension == "php") {
                     /*Recorremos el array */
                     foreach ($proyectos as $p) {
                     if (basename($p["enlace"]) === $archivo) {
                        echo "<tr class='border-2 p-3'>";
                        echo "<td class='border-2 p-3'>".$p["nombre"]."</td>";
                        echo "<td class='border-2 p-3'>".$p["descripcion"]."</td>";
                        echo "<td class='border-2 p-3'> <a href='".$p["enlace"]."' class='hover:text-blue-700'>Enlace ejercicio</a> </td>";
                        echo "</tr>";
                        $existe = true;
                           break;
                        }
                     }
                     if (!$existe) {
                        echo "<tr class='border-2 p-3'>";
                        echo "<td class='border-2 p-3'>".basename($archivo, ".php")."</td>";
                        echo "<td class='border-2 p-3'>Nuevo Ejercicio</td>";
                        echo "<td class='border-2 p-3'> <a href='".$dir.$archivo."' class='hover:text-blue-700'>Enlace ejercicio</a></td>";
                        echo "</tr>";
                     }
                  }
               }
            ?>
      </table>
</div>
</html> 