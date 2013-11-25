<?php

function csvtoxml($fileCSV, $namaTabel, $namaTupple){
	//menciptakan dokumen
	$doc = new DomDocument();
	$doc->formatOutput = true;

	//menciptakan root
	$root = $doc->createElement($namaTabel);
	$root = $doc->appendChild($root);

	//mendapatkan header
	$head = $fileCSV[0];
	$atribut = explode(",", $head);
	$n = 0;

	//mendapatkan isi csv
	foreach ($fileCSV as $row):
	    if($n != 0){
	        $container = $doc->createElement($namaTupple);

	        $tupple = explode(",", $row);
	        $o = 0;
	        foreach ($tupple as $tp):
	            $child = $doc->createElement(trim($atribut[$o]), trim($tp));
	        	$child = $container->appendChild($child);

	            $o++;
	        endforeach;
	        $root->appendChild($container);
	    }
	    $n++;
	endforeach;

	//menghasilkan xml
	return $doc->saveXML();
}

function getXmlOrder($xml, $no){

	$xmlDom = simplexml_load_string($xml);
	$hasil = '';
	$n = 1;

	foreach ($xmlDom->children() as $row1):
		if($n == $no){
			
			$hasil .= "<".$row1->getName().">";
			foreach($row1->children() as $row2){
				$hasil .= "<".$row2->getName().">";
				$hasil .= $row2;
				$hasil .= "</".$row2->getName().">";
			}
			$hasil .= "</".$row1->getName().">";
		}
		$n++;
	endforeach;
	
	return $hasil;
}