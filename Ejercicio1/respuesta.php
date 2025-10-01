<?php
echo "<h2>".$_GET['nombre_usuario']."</h2>";
echo "<h2>".$_GET['listaDeColores']."</h2>";
if (.$_GET['listaDeColores']=='rojo'){
    echo "<body style='background-color:red;'>"
}
?>