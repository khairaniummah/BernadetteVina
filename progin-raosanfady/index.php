<!-- 
Raosan Fikri Lillahi 	/ 18211027
Fady Noor				/ 18211015 
-->

<!DOCTYPE html>
<html>
<head>
   <title>Data to Information XML</title>
</head>
<body>
<?php
$xml=simplexml_load_file("data.xml");


echo "<h1>".$xml->getName()."</h1>";
foreach($xml->children() as $child)
   {
   echo $child->getName() . ": " . $child . "<br>";
   }
?> 
   <div>
      <h3>Please select which average information you want to retrieve:</h3>   
   </div>
   <div>
      <a href="umur.php"><button>Rata-rata umur</button></a>
      <a href="tinggi.php"><button>Rata-rata tinggi badan</button></a>
      <a href="berat.php"><button>Rata-rata berat badan</button></a>
   </div>

</body>
</html>