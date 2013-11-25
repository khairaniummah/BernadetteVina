<?php
header('Content-Type: text/xml');
echo "<?xml version='1.0'?>";
echo "<data>";
if (($csvfile = fopen("test2.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
        echo "<tabel_1>";
        echo "<nama>".$data[0]."</nama>";
        echo "<harga>".$data[1]."</harga>";
        echo "<jenis>".$data[2]."</jenis>";
        echo "</tabel_1>";
    }
}
echo "</data>";

