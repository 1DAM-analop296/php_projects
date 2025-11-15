<?php
/*Obtenemos el nombre la pagina que nos encontramos */
$paginaActual = basename($_SERVER['PHP_SELF']);
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
    <div class="flex flex-col justify-content pt-4 gap-5">
        <div class="bg-blue-200 p-3 w-full items-center flex justify-center font-bold text-3xl"> 
            <p>Ana López Galán</p>
        </div>
        <div class="grid grid-cols-5 gap-4 w-auto justify-items-center text-2xl mt-auto">
          <a href="./Index.php" class="hover:text-blue-400 rounded-lg <?php if($paginaActual=='Index.php'){echo 'bg-blue-200 p-3 font-bold';} ?>">Index</a>
          <a href="./Inicio.php" class="hover:text-blue-400 rounded-lg <?php if($paginaActual=='Inicio.php'){echo 'bg-blue-200 p-3 font-bold';} ?>">Inicio</a>
          <a href="./sobremi.php" class="hover:text-blue-400 rounded-lg <?php if($paginaActual=='sobremi.php'){echo 'bg-blue-200 p-3 font-bold';} ?>">Sobre mí</a>
          <a href="./proyectos.php" class="hover:text-blue-400 rounded-lg <?php if($paginaActual=='proyectos.php'){echo 'bg-blue-200 p-3 font-bold';} ?>">Proyectos</a>
          <a href="./Contacto.php" class="hover:text-blue-400 rounded-lg <?php if($paginaActual=='Contacto.php'){echo 'bg-blue-200 p-3 font-bold';} ?>">Contactos</a>
        </div>
    <div>
  </body>
</html>