<?php

class Liverpoolplayer extends CI_Model {
	
	//constructor
	public function __construct(){
		parent::__construct();
	}

	//functions
	function get_array(){
	$q = $this->db->get('liverpul');

		if($q->num_rows() > 0){
			foreach ($q->result() as $row) 
			{
				$data[] = $row;
			}
		$playerdata['players'] = $data;
		return $playerdata;

		}
	}

	function get_id($id){
		return $this->db->get_where('liverpul', array('id' => $id)); 
	}
	function get_all(){
		return $this->db->get('liverpul');
	}
	
}