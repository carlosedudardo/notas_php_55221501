<?php
    require 'models/estudiante.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/estudiantesController.php';

    use estudianteController\EstudiantesController;

    $estudianteController = new EstudiantesController();

    $estudiantes = $estudianteController->read();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <main>
        <h1>LISTA DE LOS ESTUDIANTES</h1>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombre() . '</td>';
                    echo '  <td>' . $estudiante->getApellido() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/formatoNuevoEstudiante.php?codigo=' . $estudiante->getCodigo() . '">modificar</a>';
                    echo '      <a>borrar</a>';
                    echo '      <a>Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <br><br>
        <a href="views/formatoNuevoEstudiante.php">AGREGAR NUEVO ESTUDIANTE</a>
    </main>
    
</body>
</html>
