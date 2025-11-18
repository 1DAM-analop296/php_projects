<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>my-project</title>
  </head>
  <body>
     <p class="border-2 p-3 bg-blue-300 border-stone-400 m-2 w-fit rounded-2xl"><a href="http://localhost/EjerciciosClase/php_projects/Unidad2/blog_personal/proyectos.php">Volver</a></p>
    <form action="Respuestas/respuestaEjercicio4.php" method="post">
      <div class="flex flex-col m-3">
        <label class="mt-4" form="numero">Dime tu salario bruto:</label>
        <input class=" border-2 w-30" type="text" id="salarioBruto" name="salario_bruto">
        <!-- Para la edad -->
        <label form="numero">Dime lo que te retienen:</label>
        <input  class="mt-2 border-2 w-30" type="text" id="salarioBruto" name="retienen">
        <button class="border-2 bg-blue-300 border-stone-400 mt-5 w-fit p-4 rounded-2xl" type="submit">Enviar</button>
        </div>
    </form>
  </body>
</html>