<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
  </head>
  <body>
    <form action="respuestaEjercicio5.php" method="post">
        <!-- Para enviar le nombre  -->
        <label form="numero">Dime tu salario bruto:</label>
        <input type="text" id="salarioBruto" name="salario_bruto">
         <br> <br>
        <!-- Para enviar el formulario -->
        <label form="numero">Dime lo que te retienen:</label>
        <input type="text" id="salarioBruto" name="salario_bruto">
         <br> <br>

        <button type="submit">Enviar</button>
    </form>
  </body>
</html>