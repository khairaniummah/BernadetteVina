<?php

include 'fungsi.php';

if (!isset($_GET['source']) && !isset($_GET['out']) && !isset($_GET['tabel'])){
	echo "<h3>parameter tidak lengkap :3</h3>";
}else{
	$fileCSV  = file($_GET['source']);
	$namaTabel = $_GET['tabel'];
	$pathOut = $_GET['out'];

	$xml = csvtoxml($fileCSV, 'tabel'.$namaTabel, $namaTabel);

	$file=fopen($pathOut, 'w');
	fwrite($file, $xml);
	fclose($file);

	echo "<h3>file csv berhasil dikonversi. Hasilnya ada di ".$pathOut."</h3>";
}



//header('Location: show.php');