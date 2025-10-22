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
        <div class="m-3">
            <!-- Para enviar le nombre  -->
        <label form="nombre">Nombre:</label>
        <input class="border" type="text" id="nombre" name="nombre_usuario">
         <br> <br>
        
         <!-- Para el apellido -->
        <label form="apellido">Apellido:</label>
        <input class="border" type="text" id="apellido" name="apellido_usuario">
        
        <!-- Para el correoElectronico -->
        <label form="correo">Correo:</label>
        <input type="text" id="correo" name="correo_electronico">
        
        <label for="opciones">Dime el color que prefieras</label>
        <select name="listaDeColores" id="opciones">
            <option value="rojo"> Rojo</option>
            <option value="verde">Verde</option>
            <option value="otro"> Otro</option>
        </select>
        <br> <br>
        <button type="submit">Enviar</button>
        </div>
    
    </form>
  </body>
</html>