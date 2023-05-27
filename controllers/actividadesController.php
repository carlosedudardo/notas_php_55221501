<?php

namespace actividadController;

use baseController\ActividadBaseController;
use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadesController extends ActividadBaseController
{

    function create($actividad){
        $sql = 'insert into actividades ';
        $sql .= '(descripcion, nota, codigoEstudiante) values';
        $sql .= '(';
        $sql .= '"' . $actividad->getDescripcion() . '",';
        $sql .= number_format($actividad->getNota(), 2, '.', '') . ',';
        $sql .= $actividad->getCodigoEstudiante(). ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read($codigo){
        $sql = 'select * from actividades';
        $sql .= ' where codigoEstudiante =' .$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoEstudiante($codigo);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($id){

    }

    function update($id, $actividad){

    }

    function delete($id){

    }
}
