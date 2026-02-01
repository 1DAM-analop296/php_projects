<?php
require 'conexion.php';

function getTareas($db){
    /*Añadimos el id del usuario que sea*/
    $sql="SELECT libros.id_libro, libros.titulo, libros.autor, libros.id_categoria, libros.disponible, libros.imagen, categorias.nombre FROM libros JOIN categorias ON categorias.id_categoria=libros.id_categoria";
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
function guardarNuevoUsuario($nombre_usuario,$email, $password,$is_admin, $db){

    /*SQL para insertar un registro cuando se trata de un string tenemos que ponerlo con comillas simples*/
	$sql="INSERT INTO usuarios(nombre_usuario, email, password, is_admin) VALUES('$nombre_usuario', '$email', '$password', '$is_admin')";

    /*Mandamos un boolean según si se ha podido insertar las usuarios. */
    if(mysqli_query($db, $sql)){
        return true;
    }else{
        return false;
    }

}
/*Función de para saber los usuarios que tenemos*/
function getUsers($db){
    $sql="SELECT id_usuario, nombre_usuario, email, password, is_admin FROM usuarios u";
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

/*Funcion para saber el id de nuestro usuario */



function getCategorias($db){
    $sql="SELECT id_categoria, nombre FROM categorias c";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

function getLibrosPorCategoria($id_categoria){

    $sql="SELECT libros.id_libro, libros.titulo, libros.autor, libros.id_categoria, libros.disponible, libros.imagen, categorias.nombre FROM libros JOIN categorias ON categorias.id_categoria=libros.id_categoria
    WHERE categorias.nombre=$id_categoria";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

function getDevolverCategoria($db, $id_categoria){
     $sql = "SELECT categorias.nombre 
            FROM categorias 
            WHERE categorias.id_categoria = $id_categoria"; 
    $resultado = mysqli_query($db, $sql);

    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        return $fila['nombre']; 
    } else {
        return ''; 
    }
}

function getObtenerLibroId($db, $id_libro){
    $sql="SELECT libros.id_libro, libros.titulo, libros.autor, libros.id_categoria, libros.disponible, libros.imagen, categorias.nombre FROM libros JOIN categorias ON categorias.id_categoria=libros.id_categoria
    WHERE libros.id_libro=$id_libro";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}


function getInsertarReserva($db, $id_usuario, $id_libro){
    $date=date("o-m-d H-i-s");
    $sql="INSERT INTO reservas (id_usuario, id_libro, fecha_reserva) VALUES ('$id_usuario','$id_libro','$descripcion','$date')";
    /*Mandamos un boolean según si se ha podido insertar las usuarios. */
    if(mysqli_query($db, $sql)){
        return true;
    }else{
        return false;
    }
}


?>
