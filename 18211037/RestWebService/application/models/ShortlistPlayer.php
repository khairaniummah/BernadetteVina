<?php

class Shortlistplayer extends CI_Model {
	
	//constructor
	public function __construct(){
		parent::__construct();
	}

	//functions
	function get_array(){
	
		$data = simplexml_load_file('./data/shortlist.xml');
		
		foreach ($data->item as $item) {
			$players[]=$item;
		}

		$playerdata['players'] = $players;
		return $playerdata;

	}

}