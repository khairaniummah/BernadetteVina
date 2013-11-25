<?php

//Dibuat Oleh
//Muhammad Fajrin (18211010)
//R. Ryan Adi Wicaksana (18211035)

$xml = new SimpleXMLElement("progin.xml".$_GET["callsign"], 0, TRUE);
?>

<table border="1">
	<caption>DAFTAR MAHASISWA ITB</caption>
	<tr><th>NIM</th><th>NAMA</th><th>ASAL</th></tr>
<?php 
$n = 0;
foreach ($xml->children() as $p) { ?>
	<tr>
	<?php foreach ($xml->children()->mahasiswa[$n] as $r) :?>
	      <td><?php echo $r . "<br>"; ?></td>
	<?php endforeach;?> 
	</tr>
<?php $n++;
}?>