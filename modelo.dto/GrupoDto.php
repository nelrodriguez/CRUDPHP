<?php

    class GrupoDto {

        private $idGrupo = 0;
        private $idProyecto = 0;
        private $idUsuario = 0;

       public function getIdGrupo() { return $this->idGrupo; } 
       public function setIdGrupo($idGrupo) { $this->idGrupo = $idGrupo;  } 

public function getIdProyecto() { return $this->idProyecto; } 
public function setIdProyecto($idProyecto) { $this->idProyecto = $idProyecto; 
} 
   public function getIdUsuario() { return $this->idUsuario; } 
public function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; 
}      
        
    }