<?php

    class SeguimientoDto {

        private $idSeguimiento = 0;
        private $observacion = "";
        private $fechaInicioFase = "";
        private $fechaFinFase = "";
        private $porcentajeAvance = "";
        private $archivoSoporte = "";
        private $idProyecto = 0;
        private $idFase = 0;
      
      public function getIdSeguimiento() { return $this->idSeguimiento; } 
      public function setIdSeguimiento($idSeguimiento) { $this->idSeguimiento = $idSeguimiento;  }  
      public function getObservacion() { return $this->observacion; } 
      public function setObservacion($observacion) { $this->observacion = $observacion; } 
      
       
      public function getFechaInicioFase() { return $this->fechaInicioFase; } 
      public function setFechaInicioFase($fechaInicioFase) { $this->fechaInicioFase = $fechaInicioFase;} 
      public function getFechaFinFase() { return $this->fechaFinFase; } 
      public function setFechaFinFase($fechaFinFase) { $this->fechaFinFase = $fechaFinFase;  } 
      public function getPorcentajeAvance() { return $this->porcentajeAvance; } 
      public function setPorcentajeAvance($porcentajeAvance) { $this->porcentajeAvance = $porcentajeAvance; } 
      public function getArchivoSoporte() { return $this->archivoSoporte; } 
      public function setArchivoSoporte($archivoSoporte) { $this->archivoSoporte = $archivoSoporte;  } 
       public function getIdProyecto() { return $this->idProyecto; } 
       public function setIdProyecto($idProyecto) { $this->idProyecto = $idProyecto; } 

public function getIdFase() { return $this->idFase; } 
       public function setIdFase($idFase) { $this->idFase = $idFase; } 
        
    }