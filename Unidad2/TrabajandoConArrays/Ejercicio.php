<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>my-project</title>
    <link href="/src/style.css" rel="stylesheet">
  </head>
  <body>
    <table>
        <?php
        $alumnos=array(
            array("nombre"=>"Ana","edad"=>17,"curso"=>"2DAM","promedio"=>9.1),
            array("nombre"=>"Luis","edad"=>18,"curso"=>"4ºESO","promedio"=>4.5),
            array("nombre"=>"Marta","edad"=>17,"curso"=>"1DAW","promedio"=>8.5),
            array("nombre"=>"Manuela","edad"=>18,"curso"=>"2DAM","promedio"=>6.7),
            array("nombre"=>"Paula","edad"=>16,"curso"=>"1DAM","promedio"=>7.2)
        );

        foreach($alumnos as $key => $alumnos){
            echo "<tr>";
            for ($i=0; $i <1 ; $i++) {   
                echo "<th>Edad</th>";
                echo "<th>Curso</th>";
                echo "<th>Promedio</th>";
            }
        
            echo "</tr>";
            echo "<tr>";
            echo "<th>".$alumnos["nombre"]."</th>";
            echo "<th>".$alumnos["edad"]."</th>";
            echo "<th>".$alumnos["curso"]."</th>";
            echo "<th>".$alumnos["promedio"]."</th>";
            echo "</tr>";
        }


        ?>
    </table>
  </body