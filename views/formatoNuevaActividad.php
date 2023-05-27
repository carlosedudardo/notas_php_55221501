<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadesController;

    $id = empty($_GET['id'])?'' : $_GET['id'];
    $actividad = new Actividad();

    if(!empty($id)){ 
        $codigoEstudiante = $_GET['codigo'];
        $nombreEstudiante = $_GET['nombre'];
        $apellidoEstudiante = $_GET['apellido'];
        $titulo = 'Modificar Actividad';
        $urlAction = "accionModificarActividad.php";
        $actividadesController = new ActividadesController();
        $actividad = $actividadesController->readRow($id);
    }else{ 
        $codigoEstudiante = $_POST['codigo'];
        $nombreEstudiante = $_POST['nombre'];
        $apellidoEstudiante = $_POST['apellido'];
        $titulo = 'Registrar Actividad';
        $urlAction = "accionRegistrarActividad.php";
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar actividad</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
        <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <span>Nombre: <?php echo $nombreEstudiante . " " . $apellidoEstudiante?></span><br>
            <span>Código: <?php echo $codigoEstudiante ?></span>
            <input type="hidden" name="codigo" value="<?php echo $codigoEstudiante ?>">
            <br>
        </label>
        <label>
            <input type="hidden" name="nombre" value="<?php echo $nombreEstudiante ?>">
            <br>
        </label>
            <input type="hidden" name="apellido" value="<?php echo $apellidoEstudiante ?>">
        <label>
            <span>Descripción: </span>
            <input name="descripcion" style="width: 200px; height: 30px" value="<?php echo $actividad->getDescripcion(); ?>" ></input>
            <br><br>
        </label>
        <label>
            <span>Nota: </span>
            <input type="number" name="nota" min="0" max = "5" step="0.01" value="<?php echo $actividad->getNota(); ?>" require>
            <br>
        </label>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <button class="button" type="submit">Guardar</button>
        </form>
</body>

</html>