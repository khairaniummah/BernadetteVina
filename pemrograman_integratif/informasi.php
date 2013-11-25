
<!-- Nama : Gilang Ramadhan / 18211045 -->
<!-- Nama : Antragama Ewa Abbas / 18211058 -->
<?php

//$keyword = $_GET['nim'];
$Mhs = new SimpleXMLElement('output.xml', null, true);
	echo "<h1>Tabel IPK Mahasiswa STI angkatan 2013</h1>";
	echo "<table border='2'><tr><td>Nama</td><td>Nim</td><td>Asal</td><td>IPK</td></tr>";
// melakukan looping penampilan data buku
$count=0;
$iter=0;
foreach($Mhs as $Mhs1){
	echo "<tr>
				<td width='200'>{$Mhs1->nim}</td>
				<td width='200'>{$Mhs1->nama}</td>
				<td width='130'>{$Mhs1->asal}</td>
				<td width='130'>{$Mhs1->ipk}</td>
			</tr>
			";
			$count+=$Mhs1->ipk;
			$iter+=1;		
	}
echo "</table>";
$rata = $count/$iter;

echo "<b>Rata-rata IPK = ".$rata."</b></br>";





 

