<?php
class MY_Session extends CI_Session{
	function sess_update(){
		// Listen to X_HTTP_REQUESTED_WITH
		if(isset($_SERVER['X_HTTP_REQUESTED_WITH']) && $_SERVER['X_HTTP_REQUESTED_WITH'] !== 'XMLHttpRequest'){
			parent::sess_update();
		}
	}
}