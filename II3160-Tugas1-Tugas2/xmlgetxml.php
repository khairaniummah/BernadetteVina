<!DOCTYPE html>
<html>
<head>
	<link href="StyleSheet.css" rel="stylesheet">
</head>


<title>
</title>

<body>
<div id="main">
  <h1>II3160 PEMROGRAMAN INTEGRATIF</h1>
  <h2>TUGAS 2</h2>
  <h2>Memperoleh Informasi dari file XML </h2>

  <h3>	

  <script>
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.open("GET","tab2.xml",false);
		xmlhttp.send();
		xmlDoc=xmlhttp.responseXML;

		document.write("<table border='1'>");
		var x=xmlDoc.getElementsByTagName("mhs");
	
		document.write("<th>Nama</th>");
		
		document.write("<th>Jurusan</th>");
		
		for (i=0;i<x.length;i++)
		  {
		  document.write("<tr><td>");
		  document.write(x[i].getElementsByTagName("Nama")[0].childNodes[0].nodeValue);
		  document.write("</td><td>");
		  document.write(x[i].getElementsByTagName("Jurusan")[0].childNodes[0].nodeValue);
		  document.write("</td></tr>");
		  }
		document.write("</table>");
		document.write("<br>")
  </script>
  </h3>
  <br>
  <br>
  <br>
  <br>
  <p>
  <form action="tab2.xml" method="get">
    <input type="submit" name="submit" value="Lihat XML" id="submit" />
  </form>
  </p>
  <p>
  <form action="tugas2.php" method="get">
    <input type="submit" name="submit" value="KEMBALI" id="submit" />
  </form>
  </p>
</div>
</body>

</html>