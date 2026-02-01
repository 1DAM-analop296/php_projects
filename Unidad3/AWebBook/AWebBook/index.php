<?php
session_start(); 

require './includes/data.php';
require './includes/header.php';
require './includes/conexion.php';
//$resultado_libros_Categoria=getLibrosPorCategoria();
 

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
            echo '<button type="button" class="btn btn-primary">Mis reservas</button>';
        } else {
            echo "Usuario no conectado.";
        }
        ?>
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
                        $texto = ($libro['disponible'] == 0) ? 'No reservado' : 'Reservado';
                        $clase = ($libro['disponible'] == 0) ? 'btn-secondary' : 'btn-primary';
                        ?>
                        <button
                            type="button"
                            class="btn <?= $clase ?> w-100"
                            onclick="<?= isset($_SESSION['id_usuario'])
                            ? 'return false;' 
                            : "window.location.href='./login.php'" ?>">
                            <?= $texto ?>
                        </button>
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
            <div class="modal-body">
                <p>Aquí se mostrarán las reservas del usuario logueado.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
function registrarLibro() {
    alert('Aquí va la función para registrar el libro');
    // Aquí pondrías tu código real para reservar el libro
}
</script>
</body>
</html>