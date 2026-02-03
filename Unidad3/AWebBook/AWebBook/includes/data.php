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

    $sql="SELECT categorias.nombre FROM libros JOIN categorias ON categorias.id_categoria=libros.id_categoria
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

function getLIbrosId($db, $id_libro){
    /*Añadimos el id del usuario que sea*/
    $sql="SELECT libros.id_libro, libros.titulo, libros.autor, libros.id_categoria, libros.disponible, libros.imagen, categorias.nombre AS categoria FROM libros JOIN categorias ON categorias.id_categoria=libros.id_categoria";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
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


function getInsertarReserva($db, $id_usuario, $id_libro, $date){
    $sql="INSERT INTO reservas (id_usuario, id_libro, fecha_reserva) VALUES ($id_usuario,$id_libro, $date)";
    /*Mandamos un boolean según si se ha podido insertar las usuarios. */
    if(mysqli_query($db, $sql)){
        return true;
    }else{
        return false;
    }
}

function devolverReservas($db, $id_usuario){

    $sql="SELECT reservas.id_reserva, reservas.id_usuario, reservas.id_libro, reservas.fecha_reserva, libros.titulo AS nombreLibros FROM reservas  
    JOIN libros ON libros.id_libro=reservas.id_libro
    WHERE reservas.id_usuario=$id_usuario";

    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

/*Funcion para devolver los usuarios admin */

function devolveradmin($db, $id_usuario){

    $sql="SELECT id_usuario, nombre_usuario, email, password, is_admin FROM usuarios
    WHERE id_usuario=$id_usuario";
    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}

/*Funcion de eliminar libro */

function eliminarLibro($db, $id_libro){
	$check=false;
    $sqlInsert="DELETE FROM reservas WHERE id_libro='$id_libro'";
    if(mysqli_query($db, $sqlInsert)){
        $sqlInsert="DELETE FROM libros WHERE id_libro='$id_libro'";
        $query=mysqli_query($db, $sqlInsert);
        return true;
    }else{
        return false;
    }
}


/*Funcion para insertar un libro*/
function getInsertarLibro($db, $titulo, $autor, $nombre_categoria, $disponible, $imagen){

    /*Cogemos el nommbre de la categoria */
    $sql = "SELECT id_categoria FROM categorias WHERE nombre = '$nombre_categoria'";
    $resultado = mysqli_query($db, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $fila = mysqli_fetch_assoc($resultado);
        $id_categoria = $fila['id_categoria'];

    /*Se la insertamos a libros el id*/
        $sqlInsert = "INSERT INTO libros (titulo, autor, id_categoria, disponible, imagen)
                      VALUES ('$titulo', '$autor', $id_categoria, $disponible, '$imagen')";

        if (mysqli_query($db, $sqlInsert)) {
            return true;
        }

        echo mysqli_error($db); 
    }

    return false;
}

function devolverTodasLasReservas($db){

    $sql="SELECT usuarios.email AS email, usuarios.nombre_usuario AS nombreUsuario, libros.titulo AS nombreLibro FROM reservas  
    JOIN libros ON libros.id_libro=reservas.id_libro JOIN usuarios ON usuarios.id_usuario=reservas.id_usuario";

    $tareas=mysqli_query($db, $sql);

    $resultado=array();

    if(mysqli_num_rows($tareas)>0){
        while($tarea=mysqli_fetch_assoc($tareas)){
            array_push($resultado,$tarea);
        }
    }
    return $resultado;
}


function getLibrosPorCategoriaNombre($db, $nombre_categoria) {
    $nombre_categoria = mysqli_real_escape_string($db, $nombre_categoria);

    $sql = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.id_categoria, libros.disponible, libros.imagen, categorias.nombre AS categoria
            FROM libros
            JOIN categorias ON categorias.id_categoria = libros.id_categoria
            WHERE categorias.nombre = '$nombre_categoria'";

    $tareas = mysqli_query($db, $sql);

    $resultado = array();

    if (mysqli_num_rows($tareas) > 0) {
        while ($tarea = mysqli_fetch_assoc($tareas)) {
            array_push($resultado, $tarea);
        }
    }

    return $resultado;
}
?>



