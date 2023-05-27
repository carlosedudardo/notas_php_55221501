<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadesController;

    $nombreEstudiante = $_POST['nombre'];
    $apellidoEstudiante = $_POST['apellido'];

    $actividad = new Actividad();
    $actividad->setDescripcion($_POST['descripcion']);
    $actividad->setNota($_POST['nota']);
    $actividad->setCodigoEstudiante($_POST['codigo']);

    if($actividad->getNota() == null || empty(trim($actividad->getDescripcion()))){
        echo '<div>Error: Los campos no pueden ser vacios</div>';
        echo '<a href="../actividades.php?codigo=' . $actividad->getCodEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver</a>';
    }else {

        $actividadesController = new ActividadesController();
        $resultado = $actividadesController->Create($actividad);
        if($resultado){
            echo '<h1>Actividad Registrada</h1>';
            //El a href de actividades.php sirve para envíar por GET los datos del código, nombre y apellido que se requiere en el fichero, pues ingresando por index.php también le llegan los datos por GET
            echo '<a href="../actividades.php?codigo=' . $actividad->getCodigoEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver</a>';
        }else{
            echo '<h1>No se pudo registrar la actividad</h1>';
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>