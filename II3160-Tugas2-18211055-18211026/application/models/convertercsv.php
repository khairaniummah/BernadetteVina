<?php

class convertercsv extends CI_Model 
	{
	public function __construct()
	{
		parent::__construct();
	}

public function daftarJus() 
{
	//CODE 1
	$filename = "./data/csv/jus.csv";
	$delimiter = ',';
	
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;

	//CODE 2
	/*$rows = array_map('str_getcsv', file("./data/csv/jus.csv"));
	$header = array_shift($rows);
	
	$csv = array();
	
	foreach ($rows as $row)
	{
  		$csv[] = array_combine($header, $row);
	}
	
	$header = NULL;
	return $csv;*/
}

}
?>
