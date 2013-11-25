<?php
//M.BINTANG ADINANDRA 18211005
//KAMILA A. WIDYANTO  18211039

function sqltoxml($sql) { //menggunakan kode milik orang lain, dengan perubahan seperlunya src: stackoverflow.com
	
	//setAwal, database diassign, dan writer xml disiapkan
	$res = mysql_query($sql);
	$xml = new XMLWriter();

	$xml->openMemory();
	$xml->startDocument();
	$xml->setIndent(true);

	$xml->startElement('mydata');

	while ($row = mysql_fetch_array($res)) {
	  $xml->startElement(mysql_field_table($res,0));
	  for ($i=0;$i<mysql_num_fields($res);$i++){
		$xml->startElement(mysql_field_name($res,$i));
		$xml->writeRaw($row[$i]);
		$xml->endElement();
	  }
	  
	  $xml->endElement();
	}

	$xml->endElement();

	return $xml->outputMemory();
}

mysql_connect('localhost', 'root', '');
mysql_select_db('menu');

if (isset($_GET["output"])) {
	$sqloutput=sqltoxml("SELECT * FROM menusnack");
	$csvoutput=sqltoxml("SELECT * FROM menusnack2");
}

?>

<!--Memulai antarmuka-->
<html>
<head>
<title>Converter</title>
</head>

<body>
<h1>Converter</h1>
<h2>SQL</h2>
<!-- menampilkan output sql ke xml-->
<textarea rows=10 cols=80><?php if(isset($sqloutput)) echo $sqloutput; ?></textarea>
<h2>CSV</h2>
<!-- menampilkan output csv ke xml-->
<textarea rows=10 cols=80><?php if(isset($csvoutput)) echo $csvoutput; ?></textarea>
<!-- membuat tombol yang dipencet akan menjalankan fungsi (konvert)-->
<form action="?output" method="POST">
<input type="submit" value="CONVERT!">
</form>
</body>
</html>



