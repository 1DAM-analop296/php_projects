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

    <span class="w-auto flex justify-center text-3xl mb-5 font-bold">INDEX</span>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-6 justify-items-center m-4">
        <?php
        $dir="./img/";
        $archivos=scandir($dir);
        foreach($archivos as $archivo){
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            if ($extension == "png" || $extension == "jpg") {
             echo "<img class='w-30' src='".$dir.$archivo."'></img>";
            }
        }
        ?>

    </div>
  </body>
</html>