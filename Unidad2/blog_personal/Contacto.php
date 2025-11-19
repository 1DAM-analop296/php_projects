<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="/src/style.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
    <?php require "Header.php"; ?>
    <span class="text-3xl font-bold flex justify-center m-5">Contactos</span>
    <?php 
    // Solo ejecutar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_FILES['fichero_usuario']) && $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK) {

            $dir_subida = './FicherosSubidos/';
            $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
            if($extension == "png" || $extension == "jpg" || $extension==".gif"){
                 if(move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
                     echo "<p class='rounded-2xl text-center w-auto bg-green-200 text-green-600 p-4'>
                        Datos enviados correctamente
                     </p>";
                     echo "<p class='text-lg m-3'>Se subió perfectamente.</p>";
            }
            }else{
                 echo "<p class='rounded-2xl text-center w-auto bg-red-200 text-red-600 p-4'>
                        Datos enviados correctamente
                     </p>";
                     echo "<p class='text-lg m-3'>Error en el formato.</p>";
            }
           
        }
    }
    ?>
<img src="./img/logoUE.png" class="w-30"/>
<form action="" method="post" class="row" enctype="multipart/form-data">
    <div class="input-group col-12 m-3">
        <input type="file" class="form-control" id="inputGroupFile04" name="fichero_usuario" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
    </div>

    <input type="submit" value="Subir archivo" class="m-4 bg-blue-500 text-white px-4 py-2 rounded">
</form>

</html>