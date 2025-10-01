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
    <form action="respuesta.php" method="get">
        <!-- Para enviar le nombre  -->
        <label form="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre_usuario">
        <!-- Para los colores -->
         <br> <br>
        <label for="opciones">Dime el color que prefieras</label>
        <select name="listaDeColores" id="opciones">
            <option value="rojo"> Rojo</option>
            <option value="verde">Verde</option>
            <option value="otro"> Otro</option>
        </select>
        <br> <br>
        <button type="submit">Enviar</button>
    </form>
  </body>
</html>