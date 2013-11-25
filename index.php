
<?php
echo "PORTAL STI. Dibuat oleh : Bernadette Vina(18211019) dan Stella Kurniawan(18211046)";
echo '<p></p>';
echo '<p></p>';
function display ($uri,$tag)
{
	echo "Data $uri";
    $xml = file_get_contents($uri);
	$element = new SimpleXMLElement($xml);
	$dom = new DomDocument();
$dom -> load($uri);
$data = $dom->getElementsByTagName($tag);
    echo( "<table border=\"1\" cellpading=\"3\"><tr>");
	$n = 0;
foreach($data as $node)
{ 
    if($n % 3 == 0) { echo '<tr>'; }
    echo( "<td>". $node -> textContent . "<td>");
    if(++$n % 3 == 0) { echo '</tr>'; }
}
echo( "</tr></table>");
echo '<p></p>';
echo '<p></p>';
	}
	
	display ("BernadetteVina/output2.xml","row");
	display ("BernadetteVina/DataXML.xml","item");
	display ("BernadetteVina/myxmlfile.xml","mahasiswa");
	display ("18211010-18211035/progin.xml","mahasiswa");
	display ("18211037\RestWebService\data/shortlist.xml","item");
	display ("BintangAdinandra/menu.xml","mymenu");
	display ("ConvertXML\database_collection/xmldb.xml", "pasien");
	display ("II3160-18211003-18211050/datasql.xml", "row");
	display ("II3160-18211003-18211050/Menu.xml", "Nasi");
	display ("II3160-18211003-18211050/output.xml", "row");
	display ("II3160--Pemrograman-Integratif-/DaftarIdol.xml", "Idol");
	display ("II3160-Tugas1-Tugas2/tab2.xml", "mhs");
	display ("II3160-Tugas1-Tugas2/csvoutput.xml", "kantor");
	display ("IPT-Assignments/data1.xml", "Anggota");
	display ("IPT-Assignments/data2.xml", "data_pesanan");
	display ("IPT-Assignments/data3.xml", "Baris");
	display ("Pemrograman_integratif/output.xml", "mahasiswa");
	display ("Pemrograman-Intergratif/dbxml.xml", "genre");
	display ("Pemrograman-Intergratif/myData.xml", "ticket");
	display ("progin/contoh.xml", "country");
	display ("progin-raosanfady/data.xml", "data");
	display ("Progint/data/csvtoxml.xml", "majalah");
	display ("Progint/data/sqltoxml.xml", "buku");
	display ("Protif/Protif/converter/mencari/buku.xml", "home");
	display ("Protif/Protif/converter/mencari/daftarbuku.xml", "buku");
	display ("Protif/Protif/database/rumah.xml", "home");
	display ("testPHP2/test.xml", "tabel_1");
	display ("tugas-2-pemrograman-integratif/data3.xml", "mahasiswa");
	display ("web-service/csvtoxml.xml", "siswa");
	display ("web-service/datasiswa.xml", "siswa");
	display ("web-service/sqltoxml.xml", "siswa");
	display ("Workspace/datasql.xml", "row");
	display ("Workspace/Menu.xml", "Nasi");
	display ("Workspace/output.xml", "row");
?>
  
