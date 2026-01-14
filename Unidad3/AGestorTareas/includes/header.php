<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Kanban de tareas</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .logo{
            width: 5rem;
            height: 5rem;
        }
    </style>
</head>

<body>
    <header class="cabecera d-flex align-items-center justify-content-center p-4">      
        <div class="flex flex-column">
            <div class="flex flex-row">
                
            <img src="./img/logo_tareas.png" class="img-fluid logo me-2" alt="Logo IES">
            <h1 class="titulo" class="text-xl font-bold">Kanban de tareas</h1>
            </div>
            <div class="flex flex-row gap-6">
                <div class="">
                    <p class="pr-20 pl-20 bg-red-600 text-white font-bold">TO DO</p>
                    <?php
                        require 'data.php';
                        $tareas_toDo=[];
                        $resultado_tareas=getTareas($conn);
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'to_do') {
                                $tareas_toDo[] = $tarea;
                            } 
                        }
                         forEach($tareas_toDo as $tarea){
                          echo "<div class='p-3 flex flex-column border rounded-xl mb-3 w-sm>";
                          echo"<p class='boder rounded-xl'>".$tarea['fecha_entrega']."</p>";
                          echo"<p class='font-bold'>".$tarea['titulo']."</p>";
                          echo"<p>".$tarea['descripcion']."</p>";
                          echo "</div>";
                         }
                    ?>
                </div>
                <div>
                    <p class="pr-20 pl-20 bg-yellow-300 text-black font-bold">DOING</p>
                 <?php
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'doing') {
                                $tareas_doing[] = $tarea;
                            } 
                        }
                         forEach($tareas_doing as $tarea){
                          echo "<div class='p-3 flex flex-column border rounded-xl mb-3 w-sm'>";
                          echo"<p class='boder rounded-xl'>".$tarea['fecha_entrega']."</p>";
                          echo"<p class='font-bold'>".$tarea['titulo']."</p>";
                          echo"<p>".$tarea['descripcion']."</p>";
                          echo "</div>";
                         }
                    ?>
                </div>
                <div>
                     <p class="pr-20 pl-20 bg-green-600 text-white font-bold">DONE</p>
                      <?php
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'done') {
                                $tareas_done[] = $tarea;
                            } 
                        }
                         forEach($tareas_done as $tarea){
                          echo "<div class='p-3 flex flex-column border rounded-xl mb-3 md:w-sm lg:w-100'>";
                          echo"<p class='boder rounded-xl'>".$tarea['fecha_entrega']."</p>";
                          echo"<p class='font-bold'>".$tarea['titulo']."</p>";
                          echo"<p>".$tarea['descripcion']."</p>";
                          echo "</div>";
                         }
                    ?>
                </div>
            </div>
        </div>
    </header>
  