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

/*Función de creación de usuarios */
function guardarNuevoUsuario($nombre, $email, $password, $db){
    $date=date("o-m-d H-i-s");


    /*SQL para insertar un registro cuando se trata de un string tenemos que ponerlo con comillas simples*/
	$sql="INSERT INTO usuarios(nombre, email, contrasenia, creado_el) VALUES('$nombre', '$email', '$password', '$date')";

    /*Ejecutamos la consulta devolvemos true o false depende de si se ha introducido o no */
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
	
}



function eliminarTarea($db, $id_tarea){
	//TODO
}

?>
