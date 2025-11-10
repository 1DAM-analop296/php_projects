<?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Validación formulario
          $nombre = $_REQUEST['nombre_usuario'];
          $apellidos = $_REQUEST['apellido_usuario'];
          $correo = $_REQUEST['correo_electronico'];
          $nombre = $_REQUEST['nombre_usuario'];
          $pais = $_REQUEST['listaDePaises'];
          $hobbies=$_REQUEST['hobbies'];
          $lenguajes=$_REQUEST['lenguajes'];
          $_SESSION['nombre_usuario'] = $nombre;
          $_SESSION['apellido_usuario'] = $apellidos;
          $_SESSION['correo_electronico'] = $correo;

          /*Comprobar si contiene algun error */
          $errores = [];


          if (empty($nombre)) {
             $errores[] ="- Por favor rellene el campo de nombre";
          }
          if (empty($apellidos)) {
            $errores[] ="- Por favor rellene el campo de apellidos";
          } if (empty($correo)) {
            $errores[] ="- Por favor rellene el campo de correo electrónico";
          }

          if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
              echo "<div class='text-red-500 font-bold' role='alert'>
              - Gmail incorrecto
              </div>";
          }

        }
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
  </head>
  <body class="bg-stone-100">
    <div class="flex justify-center m-3 w-fit border border-white p-3 bg-white rounded-sm shadow-2xl">
       <div class="justify-center items-center">
        <?php
          if(!empty($errores)){
            foreach($errores as $error){
               echo "<div class='text-red-500 font-bold' role='alert'>
                $error
              </div>";
            }
            }else{
              // Mostar el nombre
               echo "<div class='text-red-500 font-bold' role='alert'>
                $nombre
              </div>";
              //Mostar el apellido
              echo "<div class='text-red-500 font-bold' role='alert'>
                $apellidos
              </div>";
              //Mostar el correo
              echo "<div class='text-red-500 font-bold' role='alert'>
                $correo
              </div>";
              //Mostar el pais
              echo "<div class='text-red-500 font-bold' role='alert'>
                $pais
              </div>";
            
          }
        ?>
      </div>
    </div>
     <a href="formulario.php" class="border-2 p-2 m-3 border-stone-600">Volver Atras</a>
  </body>
</html>