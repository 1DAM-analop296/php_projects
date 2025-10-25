<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
       <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación formulario
        $nombre = $_REQUEST['nombre_usuario'];
        $apellidos = $_REQUEST['apellido_usuario'];
        $correo = $_REQUEST['correo_electronico'];

        if (empty($nombre)) {
            echo "<div class='alert alert-danger mt-4 text-center' role='alert'>
            Por favor rellene el campo de nombre
            </div>";
        } elseif (empty($apellidos)) {
            echo "<div class='alert alert-danger mt-4 text-center' role='alert'>
            Por favor rellene el campo de apellidos
            </div>";
        } elseif (empty($correo)) {
            echo "<div class='alert alert-danger mt-4 text-center' role='alert'>
            Por favor rellene el campo de correo electrónico
            </div>";
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger mt-4 text-center' role='alert'>
            Gmail incorrecto
            </div>";
        }
}
?>
  </body>
</html>