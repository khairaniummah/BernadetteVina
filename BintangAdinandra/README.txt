18211005 M Bintang Adiandra
18211039 Kamila A. Widyanto


PENJELASAN SINGKAT TUGAS
------------------------
Tugas sudah dibuat repository di github, namun saat ingin diambil URInya tidak bisa karena tidak bisa login. Setelah baca-baca solusinya memang github untuk windows memamg sulit, ada solusi yang mengatakan harus diinstall lagi dan lagi.

File yang sudah dikirim hanyalah sourcecodenya, dan databasenya.
Untuk eksekusi, harus dibuat database bernama "menu".
"menu" kemudian mengimport data yang sudah dibuat.
Pada kumpulan file terdapat 3 database:
menu.xml
menu.csv
menu.sql
*) Seluruh tahap diatas dilakukan di phpmyadmin terlebih dahulu

Untuk menu.csv, perlu dibuat kolom masing-masing "menu" dan "harga", baris pertama isi menu.csv yang sudah di import juga harus dihapus

Setelah seluruh database diimport, maka ada 2 file yang bisa dijalankan (cukup ketik: localhost/<namafile>.php)
ada 2 file:
1. converter (sql to xml, dan csv to xml)
2. carimahal (pencarian mana makanan yang paling mahal dan murah dari masing2 database)
3. carimahalv2 (carimahal yang tampilannya lebih rapih)
