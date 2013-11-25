<?php

//setting database mysql
$config['host']            = "localhost";
$config['username']        = "root";
$config['password']        = "datamining";
$config['database_name']   = "gadget";
$config['table_name']      = "handphone";
 
//connect to host
mysql_connect($config['host'],$config['username'],$config['password']);
//select database
@mysql_select_db($config['database_name']) or die( "Database not available!");

$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$root_element = $config['table_name']."s";
$xml         .= "<$root_element>";

//convert to XML
$sql = "SELECT * FROM ".$config['table_name'];
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
 
if(mysql_num_rows($result)>0) {
   while($result_array = mysql_fetch_assoc($result)) {
      $xml .= "<".$config['table_name'].">";
      foreach($result_array as $key => $value) {
         $xml .= "<$key>";
         $xml .= "<![CDATA[$value]]>";
         $xml .= "</$key>";
      }
      $xml.="</".$config['table_name'].">";
   }
}

//close elemen root
$xml .= "</$root_element>";
 
//kirim header xml ke web browser
header ("Content-Type:text/xml");
 
//cetak data XML
echo $xml;
?>