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
        for($numeros=1; $numeros<=6; $numeros++){
            echo"<h$numeros>H$numeros -". $_POST['nuevo_texto'] . "</h$numeros>";
        }
        ?>
  </body>
</html>