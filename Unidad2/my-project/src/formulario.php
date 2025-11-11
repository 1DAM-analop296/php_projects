<?php
session_start();

/* Obtener los valores de la sesión*/
$nombre = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : '';
$correo = isset($_SESSION['correo_electronico']) ? $_SESSION['correo_electronico'] : '';
$apellido = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : '';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-stone-100">
    <form action="procesar.php" method="post">
        <div class="flex justify-center m-3 w-80 border border-white p-3 bg-white rounded-sm shadow-2xl">
          <div class="justify-center items-center">
            <!-- Para enviar le nombre  -->
        <label form="nombre">Nombre:</label>
        <input class="border" type="text" id="nombre" name="nombre_usuario" value="<?php echo htmlspecialchars($nombre); ?>"><!-- Ponemos el echo para que guarde -->
         <br> <br>
         <!-- Para el apellido -->
        <label form="apellido">Apellido:</label>
        <input class="border" type="text" id="apellido" name="apellido_usuario" value="<?php echo htmlspecialchars($apellido);?>">
        <br> <br>
        <!-- Para el correoElectronico -->
        <label form="correo">Correo:</label>
        <input class="border" type="text" id="correo" name="correo_electronico" value="<?php echo htmlspecialchars($correo);?>">
        <br> <br>
        <!-- Para el pais-->
        <label for="opciones">Dime tu País:</label>
        <select name="listaDePaises" id="opciones">
            <option value="España"> España</option>
            <option value="<Francia">Francia</option>
            <option value="otro"> Portugal</option>
        </select>
        <br> <br>
         <label for="intereses">Selecciona tus intereses:</label><br>
        <select id="intereses" class="form-select" multiple="true" name="hobbies[]">
          <option value="programacion">Programación</option>
          <option value="diseño">Diseño</option>
          <option value="videojuegos">Videojuegos</option>
          <option value="robotica">Robótica</option>
        </select>
        <br> <br>
         <p>Selecciona tu curso:</p>
         <input type="radio" id="curso1" name="curso" value="1DAM">
         <label for="curso1">1DAM</label><br>

         <input type="radio" id="curso2" name="curso" value="2DAM">
         <label for="curso2">2DAM</label>
        <br><br>
        <div class="col-12">
          <p>Dime una afición que tengas:<p>
          <input type="checkbox" name="aficiones[]" value="noticias"> Noticias</input><br>
          <input type="checkbox" name="aficiones[]" value="promociones"> Promociones</input><br>
          <input type="checkbox" name="aficiones[]" value="actualizaciones"> Actualizaciones</input><br>
          <input type="checkbox" name="aficiones[]" value="eventos"> Eventos</input><br>
        </div>
        <div class="flex justify-center">
           <button class="justify-center border pl-10 pr-10  mt-4 bg-blue-500 text-white rounded-sm" type="submit">Enviar</button>
           <a href="limpiar.php" class="justify-center border pl-10 pr-10 mt-4 bg-red-500 text-white rounded-sm inline-block text-center">Limpiar</a>
        </div>
        </div>
    </div>
    </form>
  </body>
</html>
