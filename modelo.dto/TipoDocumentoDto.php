    <?php

    class TipoDocumentoDto {

        private $idTipoDocumento = 0;
        private $tipoDocumento = "";
      
        


        function getIdTipoDocumento() { 
            return $this->idTipoDocumento; 
        } 
        function setIdTipoDocumento($idTipoDocumento) { 
            $this->idTipoDocumento = $idTipoDocumento; 
        } 

       

        function getTipoDocumento() { return $this->tipoDocumento; } 
        function setTipoDocumento($tipoDocumento) { $this->tipoDocumento = $tipoDocumento;  } 

         
    }