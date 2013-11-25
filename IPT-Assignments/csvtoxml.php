<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Progin1</title>

<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);
ini_set('auto_detect_line_endings', true);

$inputFilename    = $_GET['data'];
$outputFilename   = $_GET['hasil'];

// Open csv to read
$inputFile  = fopen($inputFilename, 'rt');

// Get the headers of the file
$headers = fgetcsv($inputFile);

// Create a new dom document with pretty formatting
$doc  = new DomDocument();
$doc->formatOutput   = true;

// Add a root node to the document
$root = $doc->createElement('rows');
$root = $doc->appendChild($root);

// Loop through each row creating a <row> node with the correct data
while (($row = fgetcsv($inputFile)) !== FALSE)
{
 $container = $doc->createElement('Baris');

 foreach ($headers as $i => $header)
 {
  $child = $doc->createElement($header);
  $child = $container->appendChild($child);
     $value = $doc->createTextNode($row[$i]);
     $value = $child->appendChild($value);
 }

 $root->appendChild($container);
}
$xml = simplexml_load_file($_GET['hasil']);

echo $xml;
foreach($xml->children() as $child)

{
  echo $child->getName().$child."<br/>";
  foreach($child->children() as $boy)
  echo $boy->getName(). ":".$boy."<br/>";
}

?>