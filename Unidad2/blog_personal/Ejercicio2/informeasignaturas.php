<?php
     echo "<p>Informe de asignaturas</p>";
$alumnos= [
    "Laura_Martinez"=>["PSP", "PROYECTO", "ACCESO A DATOS"],
    "Ana Lopez"=>["Multimedia", "PSP", "ACCESO A DATOS"],
    "Ana_Sanchez"=>["PROGRAMACION MULTIMEDIA", "PROYECTO", "ACCESO A DATOS"],
    "David_rodriguez"=>["PSP", "ACCESO A DATOS", "OPTATIVA"],
];


    foreach ($alumnos as $key=>$p) {
         echo "<p name=''>Alumno ".$key."</p>";
         echo "<p>Asignaturas matriculadas:</p>";
         echo "<ul>";
            foreach($p as $nuevo){
            echo "<li>".$nuevo."</li>";
            }
            echo "</ul>";
    }
        echo"<form action='Unidad2\blog_personal\Misasignaturas.phpMisasignaturas.php' method='post'>";
        echo"<label form='numPersona'>Nombre del usuario:</label>";
        echo" <input class='border' type='text' id='imagnes' name='nombre_persona'>";
        echo"<button class='justify-center border pl-10 pr-10 mt-4 bg-blue-500 text-white rounded-sm' type='submit'>Mostar Pagina</button>";
        echo "</form>";
?>