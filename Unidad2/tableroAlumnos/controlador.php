<?php
require_once 'modelo.php';
require_once 'vista.php';

$ruta = "data/tablero1.csv"; 
$tablero = leerArchivoCSV($ruta);
$posicion = leerget();

$posicionMina = getTableroMarkup($tablero);

$nuevasPosiciones = calcularPosicionBotones($posicion);

pintarBotonesMarkup($nuevasPosiciones, $posicionMina);
anadirVida();
