<?php

namespace actividad;

class Actividad{
    private $id;
    private $descripcion;
    private $nota;
    private $codigo_estudiante;

    public function getId(){
        return $this_id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($value){
        $this->descripcion = $value;
    }

    public function getNota(){
        return $this->nota;
    }

    public function setNota($value){
        $this->nota = $value;
    }

    public function getCodigo_estudiante(){
        return $this->codigo_estudiante;
    }

    public function setCodigo_estudiante($value){
        $this->codigo_estudiante = $value;
    }


}