<?php
/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errores=0;
$vidas=0;

if (isset($_GET['num_vidas'])) {
    $vidas = (int)$_GET['num_vidas'];
}



function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}


function getTableroMarkup ($tablero){
    global $errores;
    $posicion = leerget();
    $posMina = leergetMina();

    $munecoIndex = $posicion['row'] * 12 + $posicion['col']; 
    $posMinaIndex = $posMina['row_mina'] * 12 + $posMina['col_mina'];


    if($munecoIndex == $posMinaIndex){
        do {
            $row = rand(0, 11);
            $col = rand(0, 11);
            $nuevoPosIndex = $row * 12 + $col;
        } while($nuevoPosIndex == $munecoIndex);

 
        $posMina['row_mina'] = $row;
        $posMina['col_mina'] = $col;
        $posMinaIndex = $nuevoPosIndex;
        global $vidas;
        $vidas++;
    }

    if($posicion['row'] < 12 && $posicion['col'] < 12){
        echo "<div class='contenedorTablero'>";
        foreach($tablero as $index => $cell){
            echo "<div class='tile $cell'>";
            if($index == $munecoIndex) getMunecoMarkup();
            if($index == $posMinaIndex) getMinaMarkup();
            echo "</div>";
        }
        echo "</div>";
    } else {
        $errores = 2;
        mensajesError($errores);
    }
    return $posMina;
}


function anadirVida(){
    global $vidas;
    echo "<div style='display:flex; gap:10px;'>";
    for($i = 0; $i < $vidas; $i++){
        getMinaMarkup();
    }
     echo "</div>";
}





function mensajesError(){
    global $errores;
    if($errores==1){
        echo "<p>No se han pasao ningun parámetro</p>";
    }else if($errores==2){
        echo"<p>Error la posión es mayor que el tablero.</p>";
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

function pintarBotonesMarkup($posiciones, $posicionMina){
    
    $row_mina = $posicionMina['row_mina'];
    $col_mina = $posicionMina['col_mina'];
    global $vidas;

    echo "<div style='display:flex; gap:10px;'>";
    echo "<a href='?row={$posiciones['arriba']['row']}&col={$posiciones['arriba']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Arriba</a>";
    echo "<a href='?row={$posiciones['abajo']['row']}&col={$posiciones['abajo']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Abajo</a>";
    echo "<a href='?row={$posiciones['izquierda']['row']}&col={$posiciones['izquierda']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Izquierda</a>";
    echo "<a href='?row={$posiciones['derecha']['row']}&col={$posiciones['derecha']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Derecha</a>";
    echo "</div>";
}




function leergetMina(){
    $aleatorioCol=random_int(1,11);
    $aleatorioRow=random_int(1,11);
    $posicionMina=[];
    if(isset($_GET['row_mina']) && isset($_GET['col_mina'])){
       $posicionMina['row_mina']=$_GET['row_mina'];
       $posicionMina['col_mina']=$_GET['col_mina'];
    }else{
        $errores=3;
        mensajesError($errores);
    }
    return $posicionMina;
}

function getMinaMarkup (){
    echo "<img src='./src/shrek.jpg' width='60' height='60'/>";
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
        $ruta = "data/tablero1.csv"; 
        $tablero = leerArchivoCSV($ruta);
        $posicion = leerget();

        $posicionMina = getTableroMarkup($tablero);

        $nuevasPosiciones = calcularPosicionBotones($posicion);

        pintarBotonesMarkup($nuevasPosiciones, $posicionMina);
        anadirVida();
    ?>
    </div>
</body>
</html>