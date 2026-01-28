<?php

require './includes/data.php';

require './includes/header.php';
require './includes/conexion.php';

$resultado_libros = getTareas($conn);



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
        <!-- Botón para ver reservas si está logueado -->

        <div class="col-4 mb-4">

        </div>

        <!--FILTRO POR CATEGORÍA-->
        <form class="col-8">

        </form>
    </div>

    <div class="row">
        <?php foreach ($resultado_libros as $libro): ?>

        <div class="col-md-4 d-flex align-items-stretch pb-1">
            <div class="card shadow">
                <img src="./img/<?= $libro['imagen']; ?>" class="img-thumbnail w-50" alt="">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $libro['titulo']; ?></h5>
                    <p class="card-text">
                        <strong>Autor:</strong><?= $libro['autor']; ?><br>
                        <strong>Categoría:<?= $libro['nombre']; ?></strong>
                    </p>
                    <div class="mt-auto">
                       <!-- Cuando haga click en reservar dirige a login -->
                        <form action="login.php" method="POST" class="d-flex justify-content-center m-2">
                        <button class="btn btn-primary w-100"><?= $libro['disponible']; ?></button>
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
            <div class="modal-body">
                <!-- Aquí se pueden listar las reservas del usuario -->
                <p>Aquí se mostrarán las reservas del usuario logueado.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
  
    </body>
</html>