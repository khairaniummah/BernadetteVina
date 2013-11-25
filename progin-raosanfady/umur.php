<!-- 
Raosan Fikri Lillahi    / 18211027
Fady Noor            / 18211015 
-->

 <!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("data.xml");


echo "<h1>".$xml->getName()."</h1>";
$n = 0;
$umur = 0;
foreach($xml->children() as $child)
   {
   echo $child->getName() . ": " . $child . "<br>";
   //(memasukkan variable child)
   if ($child->getName()=="umur") {
   		$n++;
   		$umur = $umur+$child;
   }
   }

   //menghitung rata-rata umur
   $avg = $umur / $n;
   echo "<h1>Rata-rata Umur = ".$avg." tahun</h1>";
?> 
<a href="index.php"><button>Kembali</button></a>
</body>
</html>
