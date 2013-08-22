<?php

class PersistenceFactory {
        
    public function getUsuarioDao(){
        return new UsuarioDaoImpl();
    }
    
}

?>
