<?php

	Class adminController Extends baseController {

            public function index() {
                $this->registry->template->show('Home_Admin');
            }

	}
	
?>
