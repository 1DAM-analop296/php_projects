<?php
require './includes/conexion.php';
require './includes/data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevoLibro'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $disponible = $_POST['disponible'];

    // Subida de archivo
    if (isset($_FILES['fichero_usuario']) && $_FILES['fichero_usuario']['error'] === UPLOAD_ERR_OK) {

        $dir_subida = './img/'; // carpeta destino
        $nombre_archivo = basename($_FILES['fichero_usuario']['name']);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));
        $fichero_subido = $dir_subida . $nombre_archivo;

        // Validar extensión
        if (in_array($extension, ['png', 'jpg', 'gif'])) {

            if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
                // Insertar libro en la DB
                $insertado = getInsertarLibro($conn, $titulo, $autor, $categoria, $disponible, $nombre_archivo); 

                if ($insertado) {
                    header('Location: index.php'); // redirigir al index
                    exit;
                } else {
                    echo "Error al insertar libro en la base de datos.";
                }

            } else {
                echo "Error al mover el archivo.";
            }

        } else {
            echo "Formato no permitido. Solo PNG, JPG o GIF.";
        }

    } else {
        echo "No se envió ningún archivo o hubo un error.";
    }
}
?>
