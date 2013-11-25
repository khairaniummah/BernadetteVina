<?php

class Otherplayer extends CI_Model {
	
	//constructor
	public function __construct(){
		parent::__construct();
	}

	//functions
	function get_array(){
	$q = new CSVReader();
	$data = $q->parse_file('./data/team.csv');

	$playerdata['players'] = $data;
	return $playerdata;
	}

}