    <?php

    class EntidadDto {

        private $idEntidad = 0;
        private $nit=0;
        private $nombreEntidad = "";
        private $correoEntidad = "";
        private $telefonoEntidad = "";
        private $idTipoDocumento = 0;
        


        function getIdEntidad() { 
            return $this->idEntidad; 
        } 
        function setIdEntidad($idEntidad) { 
            $this->idEntidad = $idEntidad; 
        } 
 function getNit() { 
            return $this->nit; 
        } 
        function setNit($nit) { 
            $this->nit = $nit; 
        }
       

        function getNombreEntidad() { return $this->nombreEntidad; } 
        function setNombreEntidad($nombreEntidad) { $this->nombreEntidad = $nombreEntidad;  } 
        function getCorreoEntidad() { 
            return $this->correoEntidad; 
        } 
        function setCorreoEntidad($correoEntidad) { 
            $this->correoEntidad = $correoEntidad;  
        } 
        function getTelefonoEntidad() { 
            return $this->telefonoEntidad; 
        } 
        function setTelefonoEntidad($telefonoEntidad) { 
            $this->telefonoEntidad = $telefonoEntidad;  
        } 
         function getIdTipoDocumento() { 
            return $this->idTipoDocumento; 
        } 
        function setIdTipoDocumento($idTipoDocumento) { 
            $this->idTipoDocumento = $idTipoDocumento; 
        } 
    }