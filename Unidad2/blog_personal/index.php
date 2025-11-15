<?php
$datosPersonales= array(
    "foto"=>"./img/fotoPersonal.jpg",
   "nombre"=>"Ana López Galán",
    "descripcion"=>"Soy una persona comprometida, responsable y orientada al aprendizaje continuo. Me gusta trabajar en equipo, asumir nuevos retos y aportar soluciones creativas a cada proyecto en el que participo.",
    "telefono"=>"644 84 79 35",
    "direccion"=>"Sevilla",
    "Email"=>"analopezgalan1506@gmail.com",
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

    <?php require "Header.php"; ?>

    <div class="flex justify-center items-start pt-4 w-full">

      <?php
      foreach($datosPersonales as $index => $dp){

          if($index == "foto"){
              echo "<div class='flex flex-col justify-center items-center border border-gray-100 shadow-2xl p-4 rounded-xl w-lg'>";
              echo "<img class='w-xs' src='".$dp."'></p>";
          }

          if($index == "nombre"){
              echo "<p class='text-lg mt-3'>".$dp."</p>";
          }

          if($index == "descripcion"){
              echo "<p class='text-sm text-justify'>".$dp."</p>";
          }

          if($index == "telefono"){
              echo "<div class='flex flex-row justify-center items-center gap-3 mt-5'>";
              echo "<img class='w-10' src='./img/telefono.png'/>";
              echo "<p>".$dp."</p>";
          }

          if($index == "direccion"){
              echo "<img class='w-7' src='./img/direccion.png'/>";
              echo "<p>".$dp."</p>";
              echo "</div>";
          }

          if($index == "Email"){
              echo "<div class='flex flex-row justify-center items-center gap-3 mt-5'>";
              echo "<img class='w-7' src='./img/gmail.png'/>";
              echo "<p>".$dp."</p>";
              echo "</div>";
              echo "</div>";
          }
      }
      ?>

    </div>
  </body>
</html>