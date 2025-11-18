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
        $salario=$_POST['salario_bruto'];
        $retienen=$_POST['retienen'];
        $salario_retenido=($salario*$retienen)/100;
        $salario_final=$salario-$salario_retenido;
        
        echo "<p> El salario final $salario_final es positivo</p>";
       
        ?>
  </body>
</html>