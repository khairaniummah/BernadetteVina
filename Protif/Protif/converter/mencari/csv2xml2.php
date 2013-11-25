<?php
class Csv2xml2
{
/**
 * Converts a CSV file to a simple XML file
 *
 * @param string $file
 * @param string $container
 * @param string $rows
 * @return string
 */
	public function csv2xml($file)
	{
		//$result = new stdClass();
		error_reporting(E_ALL ^ E_NOTICE);
		ini_set("display_errors", true);      	
        	$handle = @fopen($file, 'r');
        	if (!$handle) return $handle;
			$data = fgetcsv($handle);
			$root = explode(",", $data[0]);		
			$xml = new SimpleXMLElement('<xml/>');
			while (($data = fgetcsv($handle)) !== FALSE) {
	    		$track = $xml->addChild('home');
				$obj = explode(",", $data[0]);
				$int = 0;
				while ( $obj[$int] !== NULL){
					$track->addChild($root[$int], $obj[$int]);
					++$int;
				}  			
			}
			Header('Content-type: text/xml');
			$xml->asXML('buku.xml');
			return $xml;
	}
	
	public function view($file) {
		$xml = $this->csv2xml($file);
		echo $xml->asXML();
	}
	
	public function search($file,$value) {
		$root=simplexml_load_file($file);
		foreach($root->children() as $xml)
		{
			if (! $xml->getName){
				foreach($xml->children() as $child)
  				{	
					if ($child->getName == $value) {
  						echo $child->getName() . ": " . $child . "<br>";
					}
				}
			}
		}
	}
	
}
