<h2>Service ENF</h2>

<p>Hai-hai kami mempunyai dua service lho. Berikut ini service yang kami sediakan :</p>
<ol>
	<li>Konverter dari CSV ke XML
		<p>Berikut parameternya :</p>
		<ul>
			<li>source : isi dengan path file csv yang akan dikonverter</li>
			<li>out : isi dengan path samapai nama file xml untuk menampung hasil konverter.<br>misal : D:\new folder\contoh.xml</li>
			<li>tabel : nama tabel yang akan digunakan.<br>misal : mahasiswa, makanan, dsb.</li>
		</ul>
		<p>contoh cara akses : http://localhost/pemrograman-integratif/csvtoxml.php?source=D:\web\file.csv&out=D:\web\file.xml&tabel=makanan</p>
		<p>Hasilnya adalah file xml yang tersimpan di path yang telah diberikan. :)</p>
	</li>
	<li>Retrieve data XML
		<p>Berikut parameternya :</p>
		<ul>
			<li>source : isi dengan path file xml yang akan ditampilkan</li>
			<li>no (opsional) : isi dengan nomor data ke berapa yang akan dilihat</li>
		</ul>
		<p>contoh cara akses : http://localhost/pemrograman-integratif/show.php?source=D:\web\file.xml&no=2<br>atau bisa juga http://localhost/pemrograman-integratif/show.php?source=D:\web\file.xml</p>
		<p>Hasilnya adalah tampilan file xml doang. Hehe :></p>
	</li>
</ol>