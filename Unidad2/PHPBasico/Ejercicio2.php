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
    <table border="2" style="border-style: double; border-collapse: collapse">
        <?php
        $numeros=0;
        for($fila = 0; $fila < 10; $fila++){
            echo "<tr>";
            for($columna = 0; $columna < 10; $columna++){
                echo"<th>$numeros</th>";
                $numeros++;
            }
            echo"</tr>";
        }
        ?>
    </table>
  </body>
</html>