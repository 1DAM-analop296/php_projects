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
    
</head>

<body>
    <header class="cabecera d-flex align-items-center justify-content-center p-4">      
        <div class="flex flex-column">
            <div class="flex flex-row items-center justify-center mb-5">
                
            <img src="../img/logo_tareas.png" class="w-10" alt="Logo IES">
            <h1 class="titulo" class="text-xl font-bold">Kanban de tareas</h1>
            </div>
             <div class="m-2">
                <button type="button"class="flex !rounded-3xl justify-end items-center gap-2 bg-cyan-200  px-3 py-2">Añadir tarea
                <img src="../img/mas.png" class="w-5 h-5 text-white">
                </button>
            </div>
             <div class="flex flex-row gap-6"> 
                <div class="w-full md:w-1/2 lg:w-1/3">
                    <p class="px-4 md:px-20 bg-red-600 text-white font-bold text-center mb-4 rounded-xl pt-2 pb-2">TO DO</p>
                    <?php
                        require_once 'data.php';
                        $tareas_toDo=[];
                        $resultado_tareas=getTareas($conn);
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'to_do') {
                                $tareas_toDo[] = $tarea;
                            } 
                        }
                         forEach($tareas_toDo as $tarea){
                         
                            echo "<div class='p-3 flex flex-col border-2 border-red-200 rounded-xl mb-3 pb-1'>";
                            echo "<div class='flex flex-row w-full border-b-2 border-gray-400 justify-between mb-2 pb-1'>";
                                echo "<p >".$tarea['fecha_entrega']."</p>";
                                echo "<div class='flex flex-row gap-3'>";
                                echo" <form action='edit_tarea.php' method='post'>";
                                echo  "<input type='hidden' name='tarea_id' value='<". $tarea['id'].">'>";
                                    echo "<button class='items-center justify-center' class='btn'name='btn_modificar'>";
                                        echo " <img src='../img/editar.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                    echo "<button class='items-center justify-center' name='btn_eliminar'>";
                                        echo " <img src='../img/papelera.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                echo "</form>";
                                echo "</div>";
                            echo "</div>";
                           
                            echo "<p class='font-bold mb-1'>".$tarea['titulo']."</p>";
                            echo "<p>".$tarea['descripcion']."</p>";
                            echo "</div>";
                         }
                    ?>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3">
                    <p class="px-4 md:px-20 bg-yellow-300 text-black font-bold text-center mb-4 rounded-xl pt-2 pb-2">DOING</p>
                 <?php
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'doing') {
                                $tareas_doing[] = $tarea;
                            } 
                        }
                         forEach($tareas_doing as $tarea){
                         
                          echo "<div class='p-3 flex flex-column border-2 border-yellow-200 rounded-xl mb-3'>";
                         echo "<div class='flex flex-row w-full border-b-2 border-gray-400 justify-between mb-2 pb-1'>";
                                echo "<p>".$tarea['fecha_entrega']."</p>";
                                echo "<div class='flex flex-row gap-3'>";
                                 echo" <form action='edit_tarea.php' method='post'>";
                                echo  "<input type='hidden' name='tarea_id' value='<?=". $tarea['id']." ?>'>";
                                    echo "<button class='items-center justify-center' name='btn_modificar'>";
                                        echo " <img src='../img/editar.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                    echo "<button class='items-center justify-center' name='btn_eliminar'>";
                                        echo " <img src='../img/papelera.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                echo "</form>";
                                echo "</div>";
                            echo "</div>";
                          echo"<p class='font-bold'>".$tarea['titulo']."</p>";
                          echo"<p>".$tarea['descripcion']."</p>";
                          echo "</div>";
                         }
                    ?>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3">
                     <p class="px-4 md:px-20 bg-green-600 text-white font-bold text-center mb-4 rounded-xl pt-2 pb-2">DONE</p>
                      <?php
                        forEach($resultado_tareas as $tarea){
                            if ($tarea['estado'] == 'done') {
                                $tareas_done[] = $tarea;
                            } 
                        }
                         forEach($tareas_done as $tarea){
                          echo "<div class='p-3 flex flex-column border-2 border-green-200 rounded-xl mb-3'>";
                           echo "<div class='flex flex-row w-full border-b-2 border-gray-400 justify-between mb-2 pb-1'>";
                                echo "<p>".$tarea['fecha_entrega']."</p>";
                                echo "<div class='flex flex-row gap-3'>";
                                 echo" <form action='edit_tarea.php' method='post'>";
                                echo  "<input type='hidden' name='tarea_id' value='<?=". $tarea['id']." ?>'>";
                                    echo "<button class='items-center justify-center' name='btn_modificar'>";
                                        echo " <img src='../img/editar.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                    echo "<button class='items-center justify-center' name='btn_eliminar'>";
                                        echo " <img src='../img/papelera.png' class='w-5 h-5'/>";
                                    echo "</button>";
                                echo "</form>";
                                echo "</div>";
                            echo "</div>";
                          echo"<p class='font-bold'>".$tarea['titulo']."</p>";
                          echo"<p>".$tarea['descripcion']."</p>";
                          echo "</div>";
                         }
                    ?>
                </div>
            </div>
        </div>
</div>
    </header>
  