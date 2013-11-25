<?php
//M. Bintang Adinandra 18211005
//Kamila A. Widyanto 18211039
//Ver 2 memiliki tampilan yang berbeda, dan pengguna bisa memilih mau yang murah atau yang mahal

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
$hargamurah = 100000; //asumsi tidak ada harga yang melebihi Rp 100000

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
<h1>Mau yang murah atau yang mahal?</h1>

<!--UNTUK DATABASE SQL-->
<?php
if (isset($_GET["cari"])) {
echo carimahal("SELECT * FROM menusnack");}
elseif (isset($_GET["cari2"])){
echo carimurah("SELECT * FROM menusnack");}
?>
<h2></h2>

<!--UNTUK DATABASE CSV-->
<?php
if (isset($_GET["cari"])) {
echo carimahal("SELECT * FROM menusnack2");}
elseif (isset($_GET["cari2"])){
echo carimurah("SELECT * FROM menusnack2");}
?>

<!--UNTUK TOMBOL CARI MURAH-->
<form action="?cari2" method="POST">
<input type="submit" value="Saya mau yang murah">
</form>
<!--UNTUK TOMBOL CARI MAHAL-->
<form action="?cari" method="POST">
<input type="submit" value="Saya mau yang mahal">
</form>


</body>
</html>