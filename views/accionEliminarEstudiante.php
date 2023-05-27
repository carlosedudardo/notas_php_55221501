<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';
    use estudianteController\EstudiantesController;

    $estudianteController = new EstudiantesController();
    $resultado = $estudianteController->delete($_GET['codigo']);
    if($resultado){
        echo '<h1>Estudiante eliminado con exito</h1>';
    }else{
        echo '<h1>No se pudo eliminar el estudiante</h1>';
    }

?>

<br>
<a href="../index.php">Volver</a>