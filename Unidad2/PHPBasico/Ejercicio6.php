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
      <p class="border-2 p-3 bg-blue-300 border-stone-400 m-2 w-fit rounded-2xl"><a href="../blog_personal/proyectos.php">Volver</a></p>
    <?php
        $numeroAleatorio=rand(1, 10);
        if($numeroAleatorio>=0 && $numeroAleatorio<5){
            echo"<p>Insuciente has sacado un $numeroAleatorio";
        }elseif($numeroAleatorio>=5 && $numeroAleatorio<6){
             echo"<p>Suficiente has sacado un $numeroAleatorio";
        }elseif($numeroAleatorio>=6 && $numeroAleatorio<7){
             echo"<p>Bien has sacado un $numeroAleatorio";
        }elseif($numeroAleatorio>=7 && $numeroAleatorio<9){
             echo"<p>Notable has sacado un $numeroAleatorio";
        }elseif($numeroAleatorio>=9 && $numeroAleatorio<10){
             echo"<p>Sobresaliente has sacado un $numeroAleatorio";
        }  
        ?>
  </body>
</html>