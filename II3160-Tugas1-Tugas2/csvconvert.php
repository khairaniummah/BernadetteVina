<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
ini_set('auto_detect_line_endings', true);

$inputCSV   = 'tab1.csv';
$outputXML  = 'csvoutput.xml';

//buka file CSV
$inputFile  = fopen($inputCSV, 'rt');

//ambil header file
$headers = fgetcsv($inputFile);

//create dom document
$doc  = new DomDocument();
$doc->formatOutput   = true;


$root = $doc->createElement('root');
$root = $doc->appendChild($root);

while (($row = fgetcsv($inputFile)) !== FALSE) {
 $container = $doc->createElement('kantor');
 foreach ($headers as $i => $header) {
  $child = $doc->createElement($header);
  $child = $container->appendChild($child);
     $value = $doc->createTextNode($row[$i]);
     $value = $child->appendChild($value);
 }
 $root->appendChild($container);
}

$strxml = $doc->saveXML();
$handle = fopen($outputXML, "w");
fwrite($handle, $strxml);
fclose($handle);

header ("Content-Type:text/xml");

echo $strxml;

?>