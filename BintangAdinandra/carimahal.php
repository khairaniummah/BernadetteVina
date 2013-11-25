<?php
//M. Bintang Adinandra 18211005
//Kamila A. Widyanto 18211039
mysql_connect('localhost', 'root', '');
mysql_select_db('menu');

//Fungsi mencari makanan yang paling mahal dari database sql
function carimahal ($sql){
$res = mysql_query($sql);

$namamahal = "";
$hargamahal = 0;

while ($row=mysql_fetch_array($res)) {
	if ($hargamahal < $row[1]) { //apabila harganya lebih kecil, maka diganti
		$hargamahal = $row[1];
		$namamahal = $row[0];
	}
}

//membuat keluaran
$returnstring = $namamahal." dengan harga Rp".$hargamahal;
return $returnstring;
}

//fungsi mencari makanan yang paling murah
function carimurah ($sql){
$res = mysql_query($sql);

$namamurah = "";
$hargamurah = 100000; //asumsi tidak ada harga yang melebihi Rp 100.00

while ($row=mysql_fetch_array($res)) {
	if ($hargamurah > $row[1]) {
		$hargamurah = $row[1];
		$namamurah = $row[0];
	}
}

$returnstring = $namamurah." dengan harga Rp".$hargamurah;
return $returnstring;
}
?>

<html>
<head>
<title>Informasi</title>
</head>
<body>

<h1>UNTUK HARGA MAHAL</h1>
<h2>Untuk database SQL</h2>
<?php
if (isset($_GET["cari"])) {
echo carimahal("SELECT * FROM menusnack");}

?>
<h2>Untuk database CSV</h2>
<?php
if (isset($_GET["cari"])) {
echo carimahal("SELECT * FROM menusnack2");}
?>

<h1>UNTUK HARGA MURAH</h1>
<h2>Untuk database SQL</h2>
<?php
if (isset($_GET["cari"])) {
echo carimurah("SELECT * FROM menusnack");}
?>
<h2>Untuk database CSV</h2>
<?php
if (isset($_GET["cari"])) {
echo carimurah("SELECT * FROM menusnack2");}
?>
<form action="?cari" method="POST">
<input type="submit" value="Cari!">
</form>


</body>
</html>