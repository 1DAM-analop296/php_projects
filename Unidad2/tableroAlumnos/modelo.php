<?php
$errores = 0;
$vidas = 0;
if (isset($_GET['num_vidas'])) {
    $vidas = (int)$_GET['num_vidas'];
}

function leerArchivoCSV($rutaArchivoCSV) {
    $tableroLineas = [];
    $contador = 0;
    $archivoNuevo = fopen($rutaArchivoCSV, "r");
    while (($line = fgetcsv($archivoNuevo)) !== false) {
        foreach ($line as $cell) {
            $tableroLineas[$contador] = $cell;
            $contador++;
        }
    }
    return $tableroLineas;
}

function leerget() {
    global $errores;
    $posicionMuneco = [];
    if (isset($_GET['col']) && isset($_GET['row'])) {
        $posicionMuneco['col'] = $_GET['col'];
        $posicionMuneco['row'] = $_GET['row'];
    } else {
        $errores = 1;
    }
    return $posicionMuneco;
}

function leergetMina() {
    global $errores;
    $posicionMina = [];
    if (isset($_GET['row_mina']) && isset($_GET['col_mina'])) {
        $posicionMina['row_mina'] = $_GET['row_mina'];
        $posicionMina['col_mina'] = $_GET['col_mina'];
    } else {
        $errores = 3;
    }
    return $posicionMina;
}

function calcularPosicionBotones($posicion){
     return [
        'arriba' => ['row' => $posicion['row'] - 1, 'col' => $posicion['col']],
        'abajo' => ['row' => $posicion['row'] + 1, 'col' => $posicion['col']],
        'izquierda' => ['row' => $posicion['row'], 'col' => $posicion['col'] - 1],
        'derecha' => ['row' => $posicion['row'], 'col' => $posicion['col'] + 1]
    ];
}