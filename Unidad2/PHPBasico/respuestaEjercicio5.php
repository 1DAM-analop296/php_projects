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
        if ($_POST['nuevo_numero'] >0) {
            echo "<p> El numero ". $_POST['nuevo_numero'] . " es positivo</p>";
        } elseif ($_POST['nuevo_numero'] <0){
            echo "<p> El numero ". $_POST['nuevo_numero'] . " es negativo</p>";
        }else{
            echo "<p> El numero es un 0";
        }  
        ?>
  </body>
</html>