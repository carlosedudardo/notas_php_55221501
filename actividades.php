<?php

    require 'models/estudiante.php';
    require 'models/actividad.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/actividadesController.php';

    use estudiante\Estudiante;
    use actividad\Actividad;
    use actividadController\ActividadesController;

    $contadorNotas = 0;
    $sumaNotas = 0;

    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];
    
    $actividadController = new ActividadesController();
    $actividades = $actividadController->read($codigoEstudiante);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ACTIVIDADES</title>
</head>

<body>
<main>
            <h1>LISTA DE ACTIVIDADES</h1>

            <?php
            
            echo '<h3>Nombre: ' . $nombreEstudiante . " " . $apellidoEstudiante .'</h3>';
            echo '<h3>Código: ' . $codigoEstudiante . '</h3>';
            
            ?>

            <br>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($actividades as $actividad){
                        echo '<tr>';
                        echo '<td>' . $actividad->getId() . '</td>';
                        echo '<td>' . $actividad->getDescripcion() . '</td>';
                        echo '<td>' . $actividad->getNota() . '</td>';
                        echo '<td>';
                        echo '      <a>Modificar</a>';
                        echo '      <a>Eliminar</a>';
                        echo '</td>';
                        echo '</tr>';
                        $contadorNotas ++;
                        $sumaNotas = $sumaNotas + $actividad->getNota();
                    }

                    //Calcular el promedio

                    if($contadorNotas == 0){
                        $imprimir = "No hay registro de actividades";
                    }else{
                        $promedio = $sumaNotas / $contadorNotas;

                        if($promedio >= 3){
                            $imprimir = "<label style='color: green'>" . number_format($promedio,3);
                        }else if($promedio < 3){
                            $imprimir = "<label style='color: red'>" . number_format($promedio,3);
                        }

                    }

                    ?>
                </tbody>
            </table>
            <br>
            <?php
            ?>
            <p>Promedio: <?php echo $imprimir; ?></p>


            <?php

            echo '<form action="views/formatoNuevaActividad.php" method="post">';
            echo '<input type="hidden" name="codigo" value="' . $codigoEstudiante . '">';
            echo '<input type="hidden" name="nombre" value="' . $nombreEstudiante . '">';
            echo '<input type="hidden" name="apellido" value="' . $apellidoEstudiante . '">';
            echo '<button type="submit">Agregar actividad</button>';
            echo '</form>';

            ?>


            <a href="index.php">Volver</a>
        </main>
</body>

    

</html>