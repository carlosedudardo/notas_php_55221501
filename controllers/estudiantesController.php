<?php

namespace estudianteController;

use baseController\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;

class EstudiantesController extends BaseController{
    function create($estudiante){
        $sql = 'insert into estudiantes ';
        $sql .= '(codigo,nombres,apellidos) values ';
        $sql .= '(';
        $sql .= '"' . $estudiante->getCodigo() . '",';
        $sql .= '"' . $estudiante->getNombre() . '",';
        $sql .= '"' . $estudiante->getApellido() . '" ';
        $sql .= ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;

    }

    function read(){
        $sql = 'SELECT * FROM estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiantes = [];
       while($registro = $resultadoSQL -> fetch_assoc()){
            $estudiante = new Estudiante();
            $estudiante -> setCodigo($registro['codigo']);
            $estudiante -> setNombre($registro['nombres']);
            $estudiante -> setApellido($registro['apellidos']);
            array_push($estudiantes, $estudiante);
       } 
       $conexiondb->close();
       return $estudiantes;
    }

    function readRow($id){

    }

    function update($id, $actividad){

    }

    function delete($id){

    }
}