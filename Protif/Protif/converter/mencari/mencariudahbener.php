<?php

class mencari {
	function caribuku($keyword){
	$daftarbuku = simplexml_load_file('../daftarbuku.xml');
	foreach ($daftarbuku as $atribut) {
		if ($atribut-> judul == $keyword) {
			$judulbuku = $atribut -> judul;
			$pengarangbuku = $atribut -> pengarang;
			$halaman = $atribut -> halaman;
			echo $judulbuku;
			echo $pengarangbuku; 
			echo $halaman;
			return;
		}
	}
	echo 'Buku yang anda cari tidak ada';
			return;

}
	
}
	


/*
echo $daftarbuku -> buku[0] -> judul;
    foreach ($daftarbuku as $songinfo):
        $title=$daftarbuku->judul;
        $artist=$daftarbuku->pengarang;
        echo $title,$artist;
    endforeach;
    echo "</ul>";


/*


function search(){
	$xml = simplexml_load_file('../daftarbuku.xml');
	echo $xml->getName() . "<br>";

		foreach($xml->children() as $child)
	  {
	  echo $child->judul . "</br>";
	  echo $child->pengarang . "</br>";
	  echo $child->getName() . ": " . $child->halaman . "</br>";
	  }
		}*/
?>