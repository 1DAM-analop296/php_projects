<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-stone-100">
    <div class="flex justify-center m-3 w-85 border border-white p-3 bg-white rounded-sm shadow-2xl">
       <div class="justify-center items-center">
       <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Validación formulario
          $nombre = $_REQUEST['nombre_usuario'];
          $apellidos = $_REQUEST['apellido_usuario'];
          $correo = $_REQUEST['correo_electronico'];

          if (empty($nombre)) {
              echo "<div class='text-red-500 font-bold' role='alert'>
              - Por favor rellene el campo de nombre
              </div>";
          } 
          if (empty($apellidos)) {
              echo "<div class='text-red-500 font-bold' role='alert'>
              - Por favor rellene el campo de apellidos
              </div>";
          } if (empty($correo)) {
              echo "<div class='text-red-500 font-bold' role='alert'>
              - Por favor rellene el campo de correo electrónico
              </div>";
          }

          if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
              echo "<div class='text-red-500 font-bold' role='alert'>
              - Gmail incorrecto
              </div>";
          }
        }
      ?>
      </div>
    </div>
  </body>
</html>