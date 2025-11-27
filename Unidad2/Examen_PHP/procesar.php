<?php
    $directorio = $_REQUEST['directorio'];
    $num_imagenes = $_REQUEST['num_imagenes'];
    $contador=0;

if ($_POST['listaDeColores'] == 'Rojo') {
    echo "<body style='background-color:red;'>";
 
} else if ($_POST['listaDeColores'] == 'Verde') {
    echo "<body style='background-color:#008000;'>";
} else if ($_POST['listaDeColores'] == 'Azul') {
    echo "<body style='background-color:#008000;'>";
}else if ($_POST['listaDeColores'] == 'Blanco') {
    echo "<body style='background-color:#008000;'>";
}else if ($_POST['listaDeColores'] == 'Negro') {
    echo "<body style='background-color:#008000;'>";
}
 $dir="./".$directorio."/";
        $archivos=scandir($dir);
        foreach($archivos as $archivo){
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        if($num_imagenes>=$contador){
            echo "<img class='widht:20px' src='".$dir.$archivo."'></img>";
            $contador++;
        }
    }
?>
