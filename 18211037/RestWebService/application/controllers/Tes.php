<?php 
class Tes extends CI_Controller{
	
	public function meh(){
		$q = $this->ShortlistPlayer->get_array();
		print_r($q);
	}
	
}