<?php
/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errores=0;


/* Zona de declaración de funciones */
//Funciones de debugueo
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

//Función lógica presentación
function getTableroMarkup ($tablero){
     global $errores;
    $posicion=leerget();
    $munecoIndex = $posicion['row'] * 12 + $posicion['col']; 
    if($posicion['row']<12 && $posicion['col']<12){
        echo "<div class='contenedorTablero'>";
        foreach($tablero as $index=>$cell){
        echo "<div class='tile $cell'>";
        if ($index == $munecoIndex){
            getMunecoMarkup();
        }
        echo "</div>";
    }
    }else{
        $errores=2;
        mensajesError($errores);
    }

}
function mensajesError(){
    global $errores;
    if($errores==1){
        echo "<p>No se han pasao ningun parámetro</p>";
    }else if($errores==2){
        echo"<p>Error la posión el mayor de la que se le asigna.</p>";
    }
}
//Función lógica de negocio
function leerArchivoCSV($rutaArchivoCSV) {
    /*Comprobamos que el existe el csv */
    $tableroLineas =[];
    $contador=0;
    /*Para conocer el nombre del archivo */
    $archivoNuevo=fopen($rutaArchivoCSV, "r");
    while(($line=fgetcsv($archivoNuevo)) !== false){
        foreach($line as $cell){
            $tableroLineas[$contador]=$cell;
            $contador++;
        }
    }
    return $tableroLineas;
}

function leerget(){
    global $errores;
    $posicionMuneco=[];
    if(isset($_GET['col']) && isset($_GET['row'])){
       $posicionMuneco['col']=$_GET['col'];
       $posicionMuneco['row']=$_GET['row'];
    }else{
        $errores=1;
        mensajesError($errores);
    }
    return $posicionMuneco;
}

function getMunecoMarkup (){
    echo "<img src='./src/imagen.jpg'/>";
}

function calcularPosicionBotones($posicion){
     return [
        'arriba' => ['row' => $posicion['row'] - 1, 'col' => $posicion['col']],
        'abajo' => ['row' => $posicion['row'] + 1, 'col' => $posicion['col']],
        'izquierda' => ['row' => $posicion['row'], 'col' => $posicion['col'] - 1],
        'derecha' => ['row' => $posicion['row'], 'col' => $posicion['col'] + 1]
    ];
    
}

function pintarBotonesMarkup($posiciones){

    echo "<a href='?row={$posiciones['arriba']['row']}&col={$posiciones['arriba']['col']}'>Arriba</a> ";
    echo "<a href='?row={$posiciones['abajo']['row']}&col={$posiciones['abajo']['col']}'>Abajo</a>";
    echo "<a href='?row={$posiciones['izquierda']['row']}&col={$posiciones['izquierda']['col']}'>Izquierda</a>";
    echo "<a href='?row={$posiciones['derecha']['row']}&col={$posiciones['derecha']['col']}'>Derecha</a>";
}



//Lógica de negocio


//Lógica de presentación



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Minified version -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Document</title>
    <style>
        .contenedorTablero {
            width:600px;
            height:600px;
            border: solid 2px grey;
            box-shadow: grey;
            display:grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: repeat(12, 1fr);
        }
        .tile {
            float: left;
            margin: 0;
            padding: 0;
            border-width: 0;
            background-image: url("./src/464.jpg");
            background-size: 209px;
            background-repeat: none;
        }
        .fuego {
            background-color: red;
            background-position: -105px -52px;
        }
        .ladrillo{
            background-color: red;
            background-position: -53px -52px;
        }
        .tierra {
            background-color: brown;
            background-position: -157px 0px;
        }
        .agua {
            background-color: blue;
            background-position: -53px 0px;
        }
        .hierba {
            background-color: green;
            background-position: 0px 0px;
        }
    </style>
</head>
<body>
    <h1>Tablero juego super rol DWES</h1>
    <?php 
        $posicion=leerget();
        $nuevasPosiciones=calcularPosicionBotones($posicion);
        pintarBotonesMarkup($nuevasPosiciones);

        ?>
    <div class="contenedorTablero">
         <?php 
          $ruta="data/tablero1.csv"; 
          $tablero=leerArchivoCSV($ruta);
          $posicion=leerget();
         getTableroMarkup($tablero);
        ?>
    </div>
</body>
</html>