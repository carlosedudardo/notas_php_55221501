<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';

    use estudiante\Estudainte;
    use estudianteController\EstudiantesController;

    $code = empty($_GET['codigo'])?'' : $_GET['codigo'];
    $titulo = 'Registrar Estudiante';
    $urlAction = "accionRegistrarEstudiante";
    $estudiante = new Estudiante();
    if(!empty($code)){
        $titulo = 'Modificar Estudiante';
        $urlAction = "accionModificarEstudiante";
        $estudianteController = new EstudianteController();
        $estudiante = $usuarioController->readRow($code);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>NUEVO ESTUDIANTE</title>
    </head>
    <body>
        <form action="<?php echo $urlAction;?>" method="post">
            <label>
                <span>Codigo:</span>
                <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo(); ?>" required>
            </label>
            <br>
            <label>
                <span>Nombres:</span>
                <input type="text" name="nombre" value="<?php echo $estudiante->getNombre(); ?>" required>
            </label>
            <br>
            <label>
                <span>Apellidos:</span>
                <input type="text" name="apellido" value="<?php echo $estudiante->getApellido(); ?>" required>
            </label>
            <br>
            <button>Guardar</button>
        </form>
    
    </body>
</html>