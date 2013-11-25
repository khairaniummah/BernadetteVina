<?php
$file = fopen("test2.csv","r");

while(! feof($file))
  {
  fgetcsv($file)';
  }

fclose($file);
?>