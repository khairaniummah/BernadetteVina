<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Progin1</title>


<?php
$xml = simplexml_load_file("data1.xml");

foreach($xml->children() as $child)

{
  echo $child->getName() . ": " . $child . "<br />";
  foreach($child->children() as $boy)
  echo $boy->getName(). ":".$boy."<br/>";
}
?>
