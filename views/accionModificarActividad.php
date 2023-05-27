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
    $actividad->setId($_POST['id']);
    $actividad->setDescripcion($_POST['descripcion']);
    $actividad->setNota($_POST['nota']);
    $actividad->setCodigoEstudiante($_POST['codigo']);

    if($actividad->getNota() == null || empty(trim($actividad->getDescripcion()))){

        echo '<div class="alert error">Error: Los campos no pueden ser vacios</div>';
        echo '<a href="../actividades.php?codigo=' . $actividad->getCodigoEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver</a>';
    }else{

        $actividadesController = new ActividadesController();
        $resultado = $actividadesController->update($actividad->getId(), $actividad);
        if($resultado){
            echo '<h1>Actividad modificada</h1>';
            echo '<a href="../actividades.php?codigo=' . $actividad->getCodigoEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver</a>';
        }else{
            echo '<h1>No se pudo modificar la actividad</h1>';
        }
    }

?>
