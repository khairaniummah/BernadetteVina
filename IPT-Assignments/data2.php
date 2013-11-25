<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Progin1</title>


<?php

$koneksi = mysql_connect("localhost","root","");

mysql_select_db("progin1",$koneksi);

$query = mysql_query("select * from anggota",$koneksi);


while($baris = mysql_fetch_array($query))
{
	echo "<center><td>".$baris['Nama']."</td></center>";
	echo "<center><td>".$baris['NIM']."</td></center>";
	echo "</tr>";

}
echo"</table>";

?>