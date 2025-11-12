<?php
$datosPersonales= array(
    "foto"=>"./img/personal.png",
   "nombre"=>"Ana López Galán",
    "descripcion"=>"El Betis se refiere principalmente al Real Betis Balompié, un club de fútbol español con sede en Sevilla, fundado en 1907",
    "contacto"=>"644 84 79 35",
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
    <div class="flex flex-row justify-content items-center pt-4 gap-5 bord">
      <?php
      foreach($datosPersonales as $index=> $dp){
       if($index=="foto"){
         echo" <div class='flex flex-col justify-center items-center border border-gray-100 shadow-2xl p-4 rounded-xl w-sm'>";
          echo "<img class='w-xs' src=" .$dp."></p>";
       }
        if ($index=="nombre"){
           echo "<p class='text-lg'>" .$dp. "</p>";
       }
       if ($index=="descripcion"){
          echo "<p class='text-sm'>" .$dp. "</p>";
       }
       if ($index=="contacto"){
        
         echo" <div class='flex flex-row justify-center items-center'>";
            echo "<img class='w-10' src='./img/telefono.png'/>";
            echo "<p>" .$dp.  "</p>";
          echo "</div>";
        echo "</div>";
       }
      }
      ?>
    <div>
  </body>
</html>