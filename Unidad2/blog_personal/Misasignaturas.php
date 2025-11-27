<?php
     echo "<p>Informe de asignaturas</p>";
$alumnos= [
    "Laura_Martinez"=>["PSP", "PROYECTO", "ACCESO A DATOS"],
    "Ana Lopez"=>["Multimedia", "PSP", "ACCESO A DATOS"],
    "Ana_Sanchez"=>["PROGRAMACION MULTIMEDIA", "PROYECTO", "ACCESO A DATOS"],
    "David_rodriguez"=>["PSP", "ACCESO A DATOS", "OPTATIVA"],
];


    foreach ($alumnos as $key=>$p) {
        if($_GET['nombre_persona'] == $key)
         echo "<p".$key."'>Alumno ".$key."</p>";
         echo "<p>Asignaturas matriculadas:</p>";
         echo "<ul>";
            foreach($p as $nuevo){
            echo "<li>".$nuevo."</li>";
            }
            echo "</ul>";
    }
?>

?>