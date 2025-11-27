<?php
/*Obtenemos el nombre la pagina que nos encontramos */
$paginaActual = basename($_SERVER['PHP_SELF']);

$cabecera= array(
    array(
        "nombre"=>"Index",
        "pagina"=>"Index.php",
        "enlace"=>"./Index.php",
    ),
    array(
      "nombre"=>"Inicio",
        "pagina"=>"Inicio.php",
        "enlace"=>"./Inicio.php",
    ),
    array(
      "nombre"=>"Sobre mí",
        "pagina"=>"sobremi.php",
        "enlace"=>"./sobremi.php",
    ),
    array(
      "nombre"=>"Proyectos",
        "pagina"=>"proyectos.php",
        "enlace"=>"./proyectos.php",
    ),
    array(
      "nombre"=>"Contacto",
        "pagina"=>"Contacto.php",
        "enlace"=>"./Contacto.php",
    ),
    
   );  

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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-stone-100">
    <div class="flex flex-col justify-content pt-4 gap-5">
        <div class="bg-blue-200 p-3 w-full items-center flex justify-center font-bold text-3xl"> 
            <p>Ana López Galán</p>
        </div>
        <div class="grid grid-flow-col auto-cols-auto gap-4 w-auto justify-items-center text-2xl mt-auto">
          <?php
           $dir="../blog_personal/";
               $archivos=scandir($dir);
               foreach($archivos as $archivo){
                  $existe=false;
               $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                  if ($extension == "php") {
                     /*Recorremos el array */
                     foreach ($cabecera as $c) {
                     if (basename($c["enlace"]) === $archivo) {
                       echo "<a href='".$c["enlace"]."' class='hover:text-blue-400 rounded-lg ".($paginaActual == $c["pagina"] ? "bg-blue-200 p-3 font-bold" : "")."'>".$c["nombre"]."</a>";
                        $existe = true;
                           break;
                        }
                     }
                     if (!$existe && strtolower($archivo) != "header.php") {
                      echo "<a href='".$dir.$archivo."' class='hover:text-blue-400 rounded-lg ".($paginaActual == $archivo ? "bg-blue-200 p-3 font-bold" : "")."'>".basename($archivo, ".php")."</a>";
                     }
                  }
               }
          ?>
        </div>
    <div>
  </body>
</html>