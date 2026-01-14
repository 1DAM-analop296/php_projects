<?php

function mensajesError($errores){
    if($errores==1){
        echo "<p>No se han pasao ningun parámetro</p>";
    }else if($errores==2){
        echo "<p>Error la posión es mayor que el tablero.</p>";
    }else if($errores==3){
        echo "<p>No se ha definido la posición de la mina</p>";
    }
}

function getMunecoMarkup() {
    echo "<img src='./src/imagen.jpg'/>";
}

function getMinaMarkup(){
    echo "<img src='./src/shrek.jpg' width='60' height='60'/>";
}

function getTableroMarkup($tablero){
    global $errores, $vidas;
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

function pintarBotonesMarkup($posiciones, $posicionMina){
    global $vidas;
    $row_mina = $posicionMina['row_mina'];
    $col_mina = $posicionMina['col_mina'];

    echo "<div style='display:flex; gap:10px;'>";
    echo "<a href='?row={$posiciones['arriba']['row']}&col={$posiciones['arriba']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Arriba</a>";
    echo "<a href='?row={$posiciones['abajo']['row']}&col={$posiciones['abajo']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Abajo</a>";
    echo "<a href='?row={$posiciones['izquierda']['row']}&col={$posiciones['izquierda']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Izquierda</a>";
    echo "<a href='?row={$posiciones['derecha']['row']}&col={$posiciones['derecha']['col']}&row_mina={$row_mina}&col_mina={$col_mina}&num_vidas={$vidas}'>Derecha</a>";
    echo "</div>";
}

function anadirVida(){
    global $vidas;
    echo "<div style='display:flex; gap:10px;'>";
    for($i = 0; $i < $vidas; $i++){
        getMinaMarkup();
    }
    echo "</div>";
}