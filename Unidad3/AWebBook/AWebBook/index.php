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

if (isset($_POST["categoria"]) && !empty($_POST["categoria"])) {
    $categoriaSeleccionada = $_POST["categoria"];
    $resultado_libros = getLibrosPorCategoriaNombre($conn, $categoriaSeleccionada);
}

if (isset($_SESSION['id_usuario'])) {
    /*Devuelve un array de array CUIDADO */
$usuario=devolveradmin($conn, $id_usuario);
} 

 if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_bd'])){
       $id = $_POST['id_libro'];
        $check_eliminar= eliminarLibro($conn, $id);
        if($check_eliminar){
            header('Location: index.php');
            exit();
        }else {
         var_dump($check_eliminar);
        }
    }

    /*Insertamos un nuevo Libro */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevoLibro'])) {
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : false;
    $autor = isset($_POST["autor"]) ? $_POST["autor"] : false;
    $nombre_categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : false;
    $disponible=isset($_POST["disponible"]) ? $_POST["disponible"] : false;

    $check_insertar= getInsertarLibro($conn, $titulo, $autor, $nombre_categoria, $disponible);
    if($check_insertar){
        header('Location: index.php');
         exit();
    }
    
}

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
            /*Devuelve un array de array Cuidado */
            if($usuario[0]['is_admin']==1){
                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarLibro">Registar Libro</button>';
                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservasAdmin">Reservas</button>';
            }else{
                 echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservasModal">Mis reservas</button>';
            }
        
        } else {
            echo "Usuario no conectado.";
        }
        ?>
        <button></button>
    <form method="POST" action="" class="d-flex gap-2">
    <select name="categoria" class="form-select">
        <option value="">Todas las categorías</option>
        <?php foreach ($resultado_categorias as $cat): ?>
    <option
        value="<?= htmlspecialchars($cat["nombre"]) ?>"
        <?= (isset($_POST["categoria"]) && $_POST["categoria"] == $cat["nombre"]) ? "selected" : "" ?>>
        <?= htmlspecialchars($cat['nombre']) ?>
    </option>
<?php endforeach; ?>

    </select>

    <button type="submit" class="btn btn-primary">Filtrar</button>
    <a href="" class="btn btn-secondary">Limpiar</a>
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
                        <strong>Autor:</strong> <?= $libro['autor']; ?><br>
                        <strong>Categoría:</strong> <?= $libro['nombre']; ?>
                    </p>
                    <div class="mt-auto">
                        <?php
                        $textoUsuario = ($libro['disponible'] == 0) ? 'No disponible' : 'Reservar';
                        $textoAdmin = ($libro['disponible'] == 0) ? 'No disponible' : 'Eliminar';
                        $clase = ($libro['disponible'] == 0) ? 'btn-secondary' : 'btn-primary';
                        ?>
                       
                        <?php if(isset($_SESSION['id_usuario'])): ?>
                            <?php if($usuario[0]['is_admin']==1): ?>
                                <form action="" method="post" class="eliminar">
                                    <input type="hidden" name="id_libro" value="<?= $libro['id_libro']; ?>">
                                    <button type="submit" name="eliminar_bd" class="btn <?= $clase ?> w-100">
                                    <?= $textoAdmin ?>
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="reserva.php" method="post" class="d-inline">
                                    <input type="hidden" name="id_libro" value="<?= $libro['id_libro']; ?>">
                                    <button type="submit" name="resevar" class="btn <?= $clase ?> w-100">
                                    <?= $textoUsuario ?>
                                    </button>
                                </form>
                             <?php endif; ?>
                        <?php else: ?>
                            <form action="reserva.php" method="post" class="d-inline">
                                <input type="hidden" name="id_libro" value="<?= $libro['id_libro']; ?>">
                                <button type="button" class="btn <?= $clase ?> w-100"
                                        onclick="window.location.href='./login.php'">
                                    <?= $textoUsuario ?>
                                </button>
                            </form>
                        <?php endif; ?>
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

<!-- Todas las reservas de todos los usuarios -->
<div class="modal fade" id="reservasAdmin" tabindex="-1" aria-labelledby="reservasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservasModalLabel">Mis Reservas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
               <?php
                    $resultado=[];
                    /*Devuelve un array de array CUIDADO */
                    $resultado=devolverTodasLasReservas($conn, $id_usuario);
                    foreach ($resultado as $libro): ?>
                        <p class="d-inline me-3"><?= $libro['nombreUsuario'] ?></p>
                        <p class="d-inline me-3"><?= $libro['email'] ?></p>
                        <p class="d-inline me-3"><?= $libro['nombreLibro'] ?></p>
                    <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="registrarLibro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Libro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="newTarea" method="post" action="">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escribe el título del libro" required>
          </div>
          <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
             <input type="text" class="form-control" id="autor" name="autor" placeholder="Escribe el autor" required>
          </div>
          <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Escribe la categoria" required>
          </div>
          <div class="mb-3">
             <label for="disponible" class="form-label">Disponible:</label>
            <input type="text" class="form-control" id="disponible" name="disponible" placeholder="Escribe el stock" required>
            </div>
          <div class="modal-footer">       
        <button type="submit" name="nuevoLibro" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
        </form>
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