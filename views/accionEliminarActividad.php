<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividadController\ActividadesController;

    $id = $_GET['id'];
    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];

    $actividadesController = new ActividadesController();
    $resultado = $actividadesController->delete($id);
    if($resultado){
        echo '<h1>Actividad Eliminada</h1>';
    }else{
        echo '<h1>No se pudo modificar la actividad</h1>';
    }

    echo '<a href="../actividades.php?codigo=' . $codigoEstudiante . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver</a>';

?>