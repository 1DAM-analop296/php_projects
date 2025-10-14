<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
  </head>
  <body>
    <form action="respuesta.php" method="post">
        <!-- Para enviar le nombre  -->
        <label form="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre_usuario">
        <!-- Para los colores -->
         <br> <br>
        <label form="edad">Edad:</label>
        <input type="text" id="edad" name="edad_usuario">
        <button type="submit">Enviar</button>
    </form>
  </body>
</html>