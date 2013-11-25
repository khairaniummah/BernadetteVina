<?php

class Csv2xml
{
	public $restler;
	
	function convert () {
		error_reporting(E_ALL | E_STRICT);
		ini_set('display_errors', true);
		ini_set('auto_detect_line_endings', true);

		$inputFilename    = 'input.csv';
		$outputFilename   = 'output.xml';

		// Open csv to read
		$inputFile  = fopen($inputFilename, 'r');

		// Get the headers of the file
		$headers = fgetcsv($inputFile);
		$node = explode(",", $headers[0]);

		// Create a new dom document with pretty formatting
		$doc  = new DomDocument();
		$doc->formatOutput   = true;

		// Add a root node to the document
		$root = $doc->createElement('home');
		$root = $doc->appendChild($root);
		echo "milestone";
		// Loop through each row creating a <row> node with the correct data
		//while (($row = fgetcsv($inputFile)) !== FALSE){
			$row = fgetcsv($inputFile);
			$obj = explode(",", $row[0]);			
 		//	$container = $doc->createElement('row');
			$int = 0;
				while ( $obj[$int] !== NULL){
					$child = $doc->createElement($node[$int]);
 	 				$child = $root->appendChild($child);
     				$value = $doc->createTextNode($obj[$int]);
     				$value = $child->appendChild($value);
					++$int;
				}
/*
			foreach ($headers as $i => $header)
				{
  				$child = $doc->createElement($header);
 	 			$child = $container->appendChild($child);
     			$value = $doc->createTextNode($row[$i]);
     			$value = $child->appendChild($value);
 				}

 			$root->appendChild($container);
*/
			//}

		echo $doc->saveXML();

	}
}
	