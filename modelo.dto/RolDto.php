<?php

    class RolDto {

        private $idRol = 0;
        private $nombreRol = "";
       
       function getIdRol() { 
            return $this->idRol; 
        } 
        function setIdRol($idRol) { 
            $this->idRol = $idRol; 
        } 
    
        function getNombreRol() { return $this->nombreRol; } 
        function setNombreRol($nombreRol) { $this->nombreRol = $nombreRol;  } 
        
    }