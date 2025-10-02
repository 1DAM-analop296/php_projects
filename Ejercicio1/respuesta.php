<?php
echo "<h2> El nombre del usuario " . $_GET['nombre_usuario'] . "</h2>";

if ($_GET['listaDeColores'] == 'rojo') {
    echo "<body style='background-color:red;'>";
    echo "<h3> Eres palangana </h3>";
} else if ($_GET['listaDeColores'] == 'verde') {
    echo "<body style='background-color:#008000;'>";
    echo "<h3> Eres del mejor equipo del mundo </h3>";
} else if ($_GET['listaDeColores'] == 'otro') {
    echo "<body style='background-color:red;'>";
    echo "<h3>Eres palangana no me quieras mentir </h3>";
}
?>
