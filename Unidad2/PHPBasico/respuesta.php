<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="/src/style.css" rel="stylesheet">
  </head>
  <body>
        <?php
        echo "<h2> El nombre del usuario " . $_POST['nombre_usuario'] . "</h2>";
        if ($_POST['edad_usuario'] >=18) {
            echo "<h3> Eres mayor de edad </h3>";
        } else {
            echo "<h3>Eres menos de edad</h3>"
        }   
        ?>
  </body>
</html>