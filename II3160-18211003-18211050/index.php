<?php 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
ini_set('auto_detect_line_endings', true);
require_once('./Converter.php');
$proc = new XsltProcessor;
echo 'Untuk melihat tabel gunakan perintah dibawah ini<br>';
echo 'Perintah1: http://localhost/?search=dataxml<br>';
echo 'Perintah2: http://localhost/?search=datasql<br>';
echo 'Perintah3: http://localhost/?search=datacsv<br>';
$t = new Converter;
if ($_GET["search"] == 'dataxml'){ //perintah: http://localhost/get.php?search=dataxml
	$inputFile = 'Menu.xml';
	$doc = new DOMDocument();
	$doc->load('Menu.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
	//$xml = file_get_contents($inputFile);

}
else if ($_GET["search"] == 'datacsv'){ //perintah: http://localhost/get.php?search=datacsv
	$convert = $t->csvConverter();
	$inputFile = 'output.xml';
	//$xml = file_get_contents($inputFile);
	//echo $xml;
	$doc = new DOMDocument();
	$doc->load('output.xsl');
	$proc->importStylesheet($doc);
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
}

else if ($_GET["search"] == 'datasql'){ //perintah: http://localhost/get.php?search=datasql
	$convert = $t->sqlConverter();
	$doc = new DOMDocument();
	$doc->load('datasql.xsl');
	$proc->importStylesheet($doc);
	$inputFile = 'datasql.xml';
	//$xml = file_get_contents($inputFile);
	$doc2 = new DOMDocument();
	$doc2->load($inputFile);
	echo $proc->transformToXML($doc2);
}
?>
