//Dibuat oleh:
//Gunawan 18211007
//Nurafni Eka Agustina 18211012
//Nicolas Novian Ruslim/18211031

<?php

$input    = 'makanan.csv';
$output   = 'menu.xml';

//Membuka file csv
$fileInput  = fopen($input, 'rt');

//Mengambil header dari file csv 
$headers = fgetcsv($fileInput);

//Membuat objek DOM
$doc  = new DomDocument();
$doc->formatOutput = true;

//Menambahkan root pada file xml
$root = $doc->createElement('daftar_makanan');
$root = $doc->appendChild($root);

//Melakukan pengulangan untuk membentuk child dan subchild pada file xml
while (($row = fgetcsv($fileInput)) !== FALSE)
{
 //membuat elemen child 'makanan'
 $container = $doc->createElement('makanan');
 foreach ($headers as $i => $header)
 {
  //membuat elemen subchild 
  $child = $doc->createElement($header);
  $child = $container->appendChild($child);
     $value = $doc->createTextNode($row[$i]);
     $value = $child->appendChild($value);
 }

 $root->appendChild($container);
}

//menyimpan hasil konversi XML ke file output
$strxml = $doc->saveXML();
$handle = fopen($output, "w");
fwrite($handle, $strxml);
fclose($handle);

	$daftarmakanan = simplexml_load_file("menu.xml");
    $totalharga=0;
	//memeriksa apakah checkbox dipilih atau tidak
	if(!empty($_POST['check_list'])) {
    	foreach($_POST['check_list'] as $check) {
			//menampilkan nama makanan yang dipilih oleh user melalui checkbox
            echo $check."&nbsp &nbsp &nbsp &nbsp";
            foreach ($daftarmakanan as $makanan){
				//membandingkan string nama makanan yang dipilih oleh user melalui checkbox dengan data di XML
            	if (strcasecmp($check, $makanan->nama)==0){
					//menampilkan harga makanan yang dipilih
	      			echo ($makanan->harga);
					//menghitung total harga
	      			$totalharga+=$makanan->harga;
	      		}
			}
			echo "<BR>";
	    }}
	//menampilkan total harga yang harus dibayar
    echo "Total Harga = ".$totalharga;
?>
