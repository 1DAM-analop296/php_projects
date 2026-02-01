<?php
require './includes/data.php';
require './includes/header.php';

// Verificar si el usuario está logueado, de lo contrario redirigir a login.php
/*session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
*/

// $tarea_editar=[];
// if (isset($_POST['tarea_id'])) {
//   //Obtener la información de la tarea que queremos editar -> getTareas
// } else {
//     header('index.php');
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmarReserva'])) {
    //Recogemos toda la información de las tareas del formulario.
    $id_libro = $_POST['id_libro'];
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : false;
    $autor = isset($_POST["autor"]) ? $_POST["autor"] : false;
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : false;
    $stock = isset($_POST["stock"]) ? $_POST["stock"] : false;
    $fecha_reserva = isset($_POST["fecha_reserva"]) ? $_POST["fecha_reserva"] : false;
    $id_usuario = $_SESSION['id_usuario'];

    /*Obtenemos el libro por el id */
    $libro = getObtenerLibroId($conn, $id_libro);
    $libro = $libro[0]; // acceder al primer elemento

    if ($libro && $libro['disponible'] > 0) {
        /*Insertamos en la tabla de reservas */
        $check_insertar = getInsertarReserva($conn, $id_usuario, $id_libro);

        /*Actualizamos tambien el libro*/
        $sql_update = "UPDATE libros SET disponible = disponible - 1 WHERE id_libro = $id_libro";
        mysqli_query($conn, $sql_update);

        if ($check_insertar) {
            header('Location: reserva.php');
            exit();
        }
    }
}

/*Obtenemos la información del libro para mostrar en el formulario*/
$informacion_libro = getObtenerLibroId($conn, $_POST['id_libro']);
$informacion_libro = $informacion_libro[0];

/*Obtenemos el nombre de la categoría del libro*/
$nombreCategoria = getDevolverCategoria($conn, $informacion_libro['id_categoria']);
?>

<body>
    <div class="d-flex justify-content-end m-2">
        <form action="index.php" method="post"> 
            <button type="submit" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>

    <form id="editTarea" method="post" action="" class="p-3 border rounded shadow bg-white">
        <input type="hidden" name="id_tarea" value="<?= $informacion_libro[0]['id_libro'];?>">

        <!-- Campo de Título -->
        <div class="mb-3">
            <label for="titulo" class="form-label fw-bold">Título</label>
            <input type="text" class="form-control form-control-lg" id="titulo" name="titulo"
                 value="<?= $informacion_libro['titulo']; ?>" placeholder="Escribe el título de la tarea" required>
        </div>

        <!-- Campo de Autor -->
        <div class="mb-3">
            <label for="autor" class="form-label fw-bold">Autor</label>
            <input type="text" class="form-control form-control-lg" id="autor" name="autor"
                value="<?= $informacion_libro['autor']; ?>" placeholder="Escribe el nombre del autor" required>
        </div>

        <!-- Campo de Categoría -->
        <div class="mb-3">
            <label for="categoria" class="form-label fw-bold">Categoría</label>
            <input type="text" class="form-control form-control-lg" id="categoria" name="categoria"
                value="<?= htmlspecialchars($nombreCategoria); ?>" placeholder="Escribe el nombre de la categoría" required>
        </div>

        <!-- Campo de stock -->
        <div class="mb-3">
            <label for="stock" class="form-label fw-bold">Stock</label>
            <input type="text" class="form-control form-control-lg" id="stock" name="stock"
               value="<?= $informacion_libro['disponible']; ?>" placeholder="Escribe el stock del libro" required>
        </div>

        <!-- Campo de Fecha de Entrega -->
        <div class="mb-3">
            <label for="fecha_reserva" class="form-label fw-bold">Confirmar reserva</label>
            <input type="date" class="form-control form-control-lg" id="fecha_reserva" name="fecha_reserva"
                value="<?= date("Y-m-d"); ?>" required>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" name="confirmarReserva" class="btn btn-primary">Confirmar Reserva</button>
        </div>
    </form>
</body>
