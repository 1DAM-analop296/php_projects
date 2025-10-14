<?php
echo "<h2> El nombre del usuario " . $_POST['nombre_usuario'] . "</h2>";

if ($_POST['listaDeColores'] == 'rojo') {
    echo "<body style='background-color:red;'>";
    echo "<h3> Eres palangana </h3>";
} else if ($_POST['listaDeColores'] == 'verde') {
    echo "<body style='background-color:#008000;'>";
    echo "<h3> Eres del mejor equipo del mundo </h3>";
} else if ($_POST['listaDeColores'] == 'otro') {
    echo "<body style='background-color:red;'>";
    echo "<h3>Eres palangana no me quieras mentir </h3>";
}
?>