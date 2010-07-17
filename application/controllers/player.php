<?php

	class Player extends Controller {
		
		function Player() {
			parent::Controller();
			$this->load->helper("url");
		}
		
		function index() {
			
			
			$this->load->view("player");
		}
		
		function getStatus() {
			
		}
		
	}

?>