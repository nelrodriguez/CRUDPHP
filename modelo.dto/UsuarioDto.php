    <?php

    class UsuarioDto {

        private $idUsuario = 0;
        private $idTipoDocumento = "";
        private $documentoUsuario = "";
        private $nombreUsuario="";
        private $apellidoUsuario="";
        private $correoUsuario="";
        private $telefonoUsuario="";
        private $foto="";
        private $claveUsuario="";
        private $idRol;


        function getIdUsuario() { 
            return $this->idUsuario; 
        } 
        function setIdUsuario($idUsuario) { 
            $this->idUsuario = $idUsuario; 
        } 

        function getIdTipoDocumento() { 
            return $this->idTipoDocumento; 
        } 
        function setIdTipoDocumento($idTipoDocumento) { 
            $this->idTipoDocumento = $idTipoDocumento;  
        } 

        function getDocumentoUsuario() { 
            return $this->documentoUsuario; 
        } 
        function setDocumentoUsuario($documentoUsuario) { 
            $this->documentoUsuario = $documentoUsuario; 
        } 
        

        function getNombreUsuario() { return $this->nombreUsuario; } 
        function setNombreUsuario($nombreUsuario) { $this->nombreUsuario = $nombreUsuario;  } 

         

        function getApellidoUsuario() { return $this->apellidoUsuario; }
        function setApellidoUsuario($apellidoUsuario) { $this->apellidoUsuario = $apellidoUsuario; } 

       

        function getFoto() { return $this->foto; } 
        function setFoto($foto) { $this->foto = $foto; } 
        
        

        function getTelefonoUsuario() { return $this->telefonoUsuario; } 
        function setTelefonoUsuario($telefonoUsuario) { $this->telefonoUsuario = $telefonoUsuario;  } 
        
        function getCorreoUsuario() { return $this->correoUsuario; } 
        function setCorreoUsuario($correoUsuario) { $this->correoUsuario = $correoUsuario; } 

        
        function getClaveUsuario() { return $this->claveUsuario; } 
        function setClaveUsuario($claveUsuario) { $this->claveUsuario = $claveUsuario;  }

        function getIdRol() { 
            return $this->idRol; 
        } 
        function setIdRol($idRol) { 
            $this->idRol = $idRol;  
        } 
    }