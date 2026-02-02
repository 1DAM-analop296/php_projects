<?php
require './includes/data.php';
require './includes/header.php';
require './includes/conexion.php';
//$resultado_libros_Categoria=getLibrosPorCategoria();

/*Obtenemos el id de nuestro usuario */
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
} 
 

$resultado_libros = getTareas($conn);
$resultado_categorias=getCategorias($conn);
  

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="container">
    <div class="row m-4 justify-content-between">
        <!-- Aquí puedes poner botones o filtros -->
        <div class="col-4 mb-4"></div>
        <form class="col-8"></form>
    </div>
    <div class="d-flex gap-2 align-items-center">
        <?php
        if (isset($_SESSION['id_usuario'])) {
         echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservasModal">Mis reservas</button>';
        } else {
            echo "Usuario no conectado.";
        }
        ?>
        <button></button>
    <select id="categoria" name="categoria" class="form-select">
        <option value="" disabled selected>Seleccione una categoría</option>
        <?php foreach ($resultado_categorias as $categoria): ?>
            <option value="<?= htmlspecialchars($categoria['nombre']); ?>">
                <?= htmlspecialchars($categoria['nombre']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="button" class="btn btn-success">Filtrar</button>
    <button type="button" class="btn btn-danger">Limpiar</button>
</div>
    <div class="row">
        <?php foreach ($resultado_libros as $libro): ?>
        <div class="col-md-4 d-flex align-items-stretch pb-1">
            <div class="card shadow">
                <img src="./img/<?= $libro['imagen']; ?>" class="img-thumbnail w-50" alt="">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $libro['titulo']; ?></h5>
                    <p class="card-text">
                        <strong>Autor:</strong> <?= $libro['autor']; ?><br>
                        <strong>Categoría:</strong> <?= $libro['nombre']; ?>
                    </p>
                    <div class="mt-auto">
                        <?php
                        $texto = ($libro['disponible'] == 0) ? 'No disponible' : 'Reservar';
                        $clase = ($libro['disponible'] == 0) ? 'btn-secondary' : 'btn-primary';
                        ?>
                       <form action="reserva.php" method="post" class="d-inline">
                        <input type="hidden" name="id_libro" value="<?= $libro['id_libro']; ?>">
                        
                        <?php if(isset($_SESSION['id_usuario'])): ?>
                            <button type="submit" name="resevar" class="btn <?= $clase ?> w-100">
                                <?= $texto ?>
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn <?= $clase ?> w-100"
                                    onclick="window.location.href='./login.php'">
                                <?= $texto ?>
                            </button>
                        <?php endif; ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal para mostrar reservas -->
<div class="modal fade" id="reservasModal" tabindex="-1" aria-labelledby="reservasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservasModalLabel">Mis Reservas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
               <?php
                    $resultado=[];
                    $resultado=devolverReservas($conn, $id_usuario);
                    foreach ($resultado as $libro): ?>
                        <p><?= $libro['nombreLibros'] ?></p>
                        <p><?= $libro['fecha_reserva'] ?></p>
                    <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
function registrarLibro() {
    // if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resevar'])){
    //    $id = $_POST['id_libro'];
    //    /*Obtenemos el libro por el id */
    //    $libro=getObtenerLibroId($conn,$id);
    //     if($libro && $libro['disponible'] > 0){
    //         /*Insertamos en la tabla de reservas */
    //         $check_insertar=$getInsertarReserva($conn,$id_usuario,$id);
    //         /*Actualizamos tambien el libro*/
    //         $sql_update = "UPDATE libros SET disponible = disponible - 1 WHERE id_libro = $id";
    //         mysqli_query($conn, $sql_update);
    //         if($check_insertar){
    //             header('Location: reserva.php');
    //             exit();
    //         }
            
    //     }
      
    // }
    
}
</script>
</body>
</html>