<?php
require 'conexion.php';
function getTareas($db){
    $sql="SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas t";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}
function guardarCambiosTarea($db, $id_tarea, $titulo,  $descripcion,  $fecha_entrega, $estado, $id_user){
	$sql = "UPDATE tareas 
            SET titulo = ?, descripcion = ?, fecha_entrega = ?, estado = ?, id_user = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssii",
        $titulo,
        $descripcion,
        $fecha_entrega,
        $estado,
        $id_user,
        $id_tarea
    );

    return mysqli_stmt_execute($stmt);
}
?>
