<?php

mysql_connect('localhost', 'root', '');
mysql_select_db('progin1');


$outputFilename   = $_GET['hasil'];

$query=mysql_query("select * from sometable")or die(mysql_error()); 
$xml="<libtest>";
while($data=mysql_fetch_array($query))
{

    $xml .="<data_pesanan>\n\t\t";
    $xml .= "<nomor>".$data['Trainee_ID']."</nomor>\n\t\t";
    $xml .= "<id_karyawan>".$data['Trainee_Name']."</id_karyawan>\n\t\t";
    $xml .= "<id_pelanggan>".$data['Trainee_Age']."</id_pelanggan>\n\t\t";
    $xml .="</data_pesanan>\n\t";
}
$xml.="</libtest>";
$traineexml=new SimpleXMLElement($xml);
$traineexml->asXML("text.xml");

$dom_traineexml = dom_import_simplexml($traineexml);
$dom = new DOMDocument('1.0');
$dom->formatOutput = true;
$dom_traineexml = $dom->importNode($dom_traineexml, true);
$dom_traineexml = $dom->appendChild($dom_traineexml);

echo $xml;
$strxml = $dom->saveXML();
$handle = fopen($outputFilename, "w");
fwrite($handle, $strxml);
fclose($handle);
//foreach($xml->children() as $child)


mysql_close();
?>