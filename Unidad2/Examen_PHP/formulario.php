<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-stone-100">
    <form action="procesar.php" method="post">
       
     <div class="flex flex-col w-70 m-4 bg-stone-50">
        <!-- Para enviar le nombre  -->
         <label form="numImegnes">Numero de images:</label>
        <input class="border" type="text" id="imagnes" name="num_imagenes">
        <!-- Para los colores -->
         <br> <br>
        <label for="opciones">Dime el color que prefieras</label>
        <select name="listaDeColores" id="opciones">
          <option value="Rojo"> Rojo</option>
            <option value="Azul">Azul</option>
            <option value="Verde"> Verde</option>
            <option value="Blanco"> Blanco</option>
            <option value="Negro"> Negro</option>
        </select>
        <br> <br>
         <p>Selecciona el directorio donde quieres crear las imagenes:</p>
         <div class="flex flex-row">
         <input type="radio" id="img1" name="directorio" value="img1">
         <label for="curso1">Directorio img1</label><br>
        </div>
        <div class="flex flex-row">
         <input type="radio" id="img1" name="directorio" value="img2">
         <label for="curso2">Directorio img2</label>
        </div>
        <button class="justify-center border pl-10 pr-10  mt-4 bg-blue-500 text-white rounded-sm" type="submit">Mostar imágenes</button>
        <br>  
      </div>
    </form>
  </body>
</html>
