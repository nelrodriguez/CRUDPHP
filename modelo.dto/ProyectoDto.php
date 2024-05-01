<?php

    class ProyectoDto {

        private $idProyecto = 0;
        private $nombreProyecto = "";
        private $fechaCreacion = "";
        private $fechaInicio = "";
        private $fechaFinal = "";
        private $estadoProyecto = "";
        private $presupuesto = "";
        private $idEntidad = 0;
       
      
      public function getIdProyecto() { return $this->idProyecto; } 
      public function setIdProyecto($idProyecto) { $this->idProyecto = $idProyecto;  }  
      public function getNombreProyecto() { return $this->nombreProyecto; } 
      public function setNombreProyecto($nombreProyecto) { $this->nombreProyecto = $nombreProyecto; } 
      
      public function getFechaCreacion() { return $this->fechaCreacion; } 
      public function setFechaCreacion($fechaCreacion) { $this->fechaCreacion = $fechaCreacion; }  
      public function getFechaInicio() { return $this->fechaInicio; } 
      public function setFechaInicio($fechaInicio) { $this->fechaInicio = $fechaInicio;} 
      public function getFechaFinal() { return $this->fechaFinal; } 
      public function setFechaFinal($fechaFinal) { $this->fechaFinal = $fechaFinal;  } 
      public function getEstadoProyecto() { return $this->estadoProyecto; } 
      public function setEstadoProyecto($estadoProyecto) { $this->estadoProyecto = $estadoProyecto; } 
      public function getPresupuesto() { return $this->presupuesto; } 
      public function setPresupuesto($presupuesto) { $this->presupuesto = $presupuesto;  } 
       public function getIdEntidad() { return $this->idEntidad; } 
       public function setIdEntidad($idEntidad) { $this->idEntidad = $idEntidad; } 


        
    }