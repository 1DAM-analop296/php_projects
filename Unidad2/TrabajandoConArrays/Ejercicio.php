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
        <?php
        echo "<table>";
        $comprobar=0;
        $numeroAprobados=0;
        $numeroSuspensos=0;
        $alumnos=array(
            array("nombre"=>"Ana","edad"=>17,"curso"=>"2DAM","promedio"=>9.1),
            array("nombre"=>"Luis","edad"=>18,"curso"=>"4ºESO","promedio"=>4.5),
            array("nombre"=>"Marta","edad"=>17,"curso"=>"1DAW","promedio"=>8.5),
            array("nombre"=>"Manuela","edad"=>18,"curso"=>"2DAM","promedio"=>6.7),
            array("nombre"=>"Paula","edad"=>16,"curso"=>"1DAM","promedio"=>7.2)
        );
        foreach($alumnos as $key => $alumno){
            echo "<tr>";
            if($comprobar==0){
               foreach($alumno as $k=>$v){
                  echo "<th>".$k."</th>";
              }
             }
            echo "</tr>";
            echo "<tr>";
            echo "<th>".$alumno["nombre"]."</th>";
            echo "<th>".$alumno["edad"]."</th>";
            echo "<th>".$alumno["curso"]."</th>";
            echo "<th>".$alumno["promedio"]."</th>";
            echo "</tr>";
            if($alumno["promedio"]>=5){
              $numeroAprobados++;
            }else{
              $numeroSuspensos++;
            }
            $comprobar++;
        }
      
        echo "</table>";
        echo "<p>Resumen de notas</p>";
        echo "<p>Total de aprobados: $numeroAprobados</p>";
        echo "<p>Total de alumnos suspensos:$numeroSuspensos </p>";
         ?>
        </body