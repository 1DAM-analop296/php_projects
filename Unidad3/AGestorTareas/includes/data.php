<?php
require 'conexion.php';

function getTareas($db, $id_usuario){
    /*Añadimos el id del usuario que sea*/
    $sql="SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas t WHERE usuario_id=$id_usuario";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

/*Función de creación de usuarios */
function guardarNuevoUsuario($nombre, $email, $password, $db){
    $date=date("o-m-d H-i-s");


    /*SQL para insertar un registro cuando se trata de un string tenemos que ponerlo con comillas simples*/
	$sql="INSERT INTO usuarios(nombre, email, contrasenia, creado_el) VALUES('$nombre', '$email', '$password', '$date')";

    /*Mandamos un boolean según si se ha podido insertar las usuarios. */
    if(mysqli_query($db, $sql)){
        return true;
    }else{
        return false;
    }

}
/*Función de para saber los usuarios que tenemos*/
function getUsers($db){
    $sql="SELECT id, nombre, email, contrasenia, creado_el FROM usuarios u";
    $usuarios=mysqli_query($db, $sql);
    /*Creamos nueestro array*/
    $resultado=array();
    /*Comprobamos que exista mas de un usuario */
    if(mysqli_num_rows($usuarios)>0){
        while($usuario=mysqli_fetch_assoc($usuarios)){
            array_push($resultado,$usuario);
        } 
    }

   return $resultado;
}


function insertarTarea($db, $titulo, $descripcion, $fecha_entrega, $estado, $id_user)
{
    $date=date("o-m-d H-i-s");
	/*Insertamos una Tarea */
    $sql="INSERT INTO tareas (usuario_id, titulo, descripcion, fecha_entrega, estado, creada_el) VALUES ('$id_user','$titulo','$descripcion','$fecha_entrega', '$estado', '$date')";

    /*Mandamos un boolean según si se ha podido insertar las usuarios. */
    if(mysqli_query($db, $sql)){
        return true;
    }else{
        return false;
    }
}



function eliminarTarea($db, $id_tarea){
	$check=false;
    $sqlInsert="DELETE FROM tareas WHERE id='$id_tarea'";
    $query=mysqli_query($db, $sqlInsert);

    if($query){
        $check=true;
    }
    return $check;
}


function actualizarDatos($db, $id_tarea, $titulo, $descripcion, $fecha_entrega, $estado, $id_user){
    
    $check=false;
   
   $sql = "UPDATE tareas SET 
        titulo='$titulo',
        descripcion='$descripcion',
        fecha_entrega='$fecha_entrega',
        estado='$estado'
        WHERE id='$id_tarea'";

    $query=mysqli_query($db, $sql);

     
    
    if($query){
        $check=true;
    }
    return $check;

}
function guardarCambiosTarea(mysqli $conn, int $id_tarea, string $titulo, string $descripcion, string $fecha_entrega, string $estado): bool {
    $stmt = $conn->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, fecha_entrega = ?, estado = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $titulo, $descripcion, $fecha_entrega, $estado, $id_tarea);

    return $stmt->execute();
}

function getTareaId($db, $id_tarea){
	$check=false;
    $sql="SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas t WHERE id=$id_tarea";

    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

?>




