<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
     <p class="border-2 p-3 bg-blue-300 border-stone-400 m-2 w-fit rounded-2xl"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/blog_personal/proyectos.php">Volver</a></p>
    <form action="Respuestas/respuestaEjercicio5.php" method="post">
        <label class="mt-4" form="numero">Numero:</label>
        <input class=" border-2 w-30" type="text" id="numero" name="nuevo_numero">
        <button class="border-2 p- bg-blue-300 border-stone-400 mt-5 w-fit p-4 rounded-2xl" type="submit">Enviar</button>
    </form>
  </body>
</html>