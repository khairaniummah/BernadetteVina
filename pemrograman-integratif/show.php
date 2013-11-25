<?php

include 'fungsi.php';

if(!isset($_GET['source'])){
	echo "<h3>parameter kurang</h3><br>";
	echo "<p>Tambahkan source=[path file xml yang akan ditampilkan]</p>";
}else{
	$xml = simplexml_load_file($_GET['source']);
	if(!isset($_GET['no'])){
		header('Content-type: text/xml');
		echo $xml->asXML();
	}else{
		header('Content-type: text/xml');
		$hasil = getXmlOrder($xml->asXML(), $_GET['no']);
		$xml2 = simplexml_load_string($hasil);
		echo $xml2->asXML();
	}
}

