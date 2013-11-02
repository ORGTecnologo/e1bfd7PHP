<?php

	Class adminController Extends baseController {

            public function index() {
                $this->registry->template->show('Home_Admin');
            }
            
            public function get_agregarServicio() {
                $this->registry->template->show('AgregarServicio');
            }

	}
        
        
	
?>
