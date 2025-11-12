<?php
$hobbies= array(
    array(
        "imagen"=>"./img/betis.png",
        "nombre"=>"Fútbol",
        "descripcion"=>"El Betis se refiere principalmente al Real Betis Balompié, un club de fútbol español con sede en Sevilla, fundado en 1907",
        "actividad"=>"1 vez/semana",
    ),
    array(
        "imagen"=>"./img/musica.jpg",
        "nombre"=>"Música",
        "descripcion"=>"La música es el arte de combinar sonidos y silencios de forma organizada, usando elementos como la melodía, el ritmo y la armonía, para crear una composición que exprese emociones, cuente historias o sea apreciada estéticamente.",
        "actividad"=>"7 vez/semana",
    ),
    array(
        "imagen"=>"./img/programacion.jpg",
        "nombre"=>"Programación",
        "descripcion"=>"La programación es el proceso de crear un conjunto de instrucciones, escritas en un lenguaje de programación, para que una computadora realice tareas específicas.",
        "actividad"=>"7 vez/semana",
    ),

)
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-stone-100">
    <div class="flex flex-row justify-content items-center pt-4 gap-5">
        <?php
        foreach($hobbies as $key => $h){
          echo"<div class='flex flex-col justify-center items-center border border-gray-100 shadow-2xl p-4 w-sm'>";
           echo "<img class='w-sm' src=".$h["imagen"]."></p>";
           echo "<p>".$h["nombre"]."</p>";
           echo "<p>".$h["descripcion"]."</p>";
           echo "<p class='rounded-lg bg-blue-200 py-1 px-2 cursor-pointer hover:bg-blue-400'>".$h["actividad"]."</p>";
           echo  "</div>";
        }
        ?>
    <div>
  </body>
</html>