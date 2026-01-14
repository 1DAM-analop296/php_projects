<?php

require 'data.php';
$tareas_doing=[];
$tareas_toDo=[];
$tareas_done=[];
$resultado_tareas=getTareas($conn);

forEach($resultado_tareas as $tarea){
   if ($tarea['estado'] == 'done') {
    $tareas_done[] = $tarea;
    } else if ($tarea['estado'] == 'doing') {
        $tareas_doing[] = $tarea;
    } else {
        $tareas_toDo[] = $tarea;
    }
}

var_export($tareas_doing); echo "<hr>";
var_export($tareas_done); echo "<hr>";
var_export($tareas_toDo); echo "<hr>"
?>