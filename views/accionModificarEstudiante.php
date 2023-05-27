<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';
    use estudiante\Estudiante;
    use estudianteController\EstudiantesController;

    $estudiante = new Estudiante();
    $estudiante->setCodigo($_POST['codigo']);
    $estudiante->setNombre($_POST['nombre']);
    $estudiante->setApellido($_POST['apellido']);

    if($estudiante->getCodigo() == null || empty(trim($estudiante->getNombre())) || empty(trim($estudiante->getApellido()))){
        echo '<div class="alert error">Error: Los campos no pueden ser vacios</div>';
    }else{
        $estudianteController = new EstudiantesController();
        $resultado = $estudianteController->update($estudiante->getCodigo(), $estudiante);
        if($resultado){
            echo '<h1>Estudiante modificado</h1>';
        }else{
            echo '<h1>No se pudo modificar el estudiante</h1>';
        }
    }

?>

<a href="../index.php">Volver al inicio</a>