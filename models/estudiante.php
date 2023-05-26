<?php

    namespace estudiante;

    class Estudiante{
        private $codigo;
        private $nombre;
        private $apellido;

        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($value){
            $this->codigo = $value;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($value){
            $this->nombre = $value;
        }

        public function getApellido(){
            return $this->apellido;
        }

        public function setApellido($value){
            $this->Apellido = $value;
        }
    }

