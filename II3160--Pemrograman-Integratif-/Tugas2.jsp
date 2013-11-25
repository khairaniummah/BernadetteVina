<!Aditya Pradita S. 18211001>
<!Rakaputra 18211059>

<!Sumber Kode: http://www.visionsdeveloper.com/blog/page/read-xml-file-using-jsp.jsp, dengan perubahan-perubahan untuk menyesuaikan dengan file XML yang kami buat>

<%@page contentType="text/html" pageEncoding="UTF-8"
        import="javax.xml.parsers.DocumentBuilderFactory,javax.xml.parsers.DocumentBuilder,org.w3c.dom.*" errorPage=""%>
<%
DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

DocumentBuilder db = dbf.newDocumentBuilder();

Document doc = db.parse("C:\\Users\\Toshiba\\Downloads\\Desktop\\DaftarIdol.xml");

NodeList No = doc.getElementsByTagName("No");
NodeList Nama = doc.getElementsByTagName("Nama");
NodeList Umur = doc.getElementsByTagName("Umur");
NodeList Gender = doc.getElementsByTagName("Gender");
NodeList Agency = doc.getElementsByTagName("Agency");

%>
<html>
    <head>
        <title>Data Peserta</title>
    </head>
    <body>
<table border="1">
    
    <tr>
   <th><b>No</b></th>
   <th><b>Nama</b></th>
   <th><b>Umur</b></th>
   <th><b>Gender</b></th>
   <th><b>Agency</b></th>

</tr>
<%
int i; //iterator untuk write data yang ada dalam file baris per baris
for(i=0;i<=No.getLength()-1;i++)
{
%>

<tr>
<td>

 <%out.println(No.item(i).getFirstChild().getNodeValue());%>
</td>
<td>
    <%out.println (Nama.item(i).getFirstChild().getNodeValue());%>
</td>
<td>
    <%out.println(Umur.item(i).getFirstChild().getNodeValue());%>
</td>
<td>
    <%out.println(Gender.item(i).getFirstChild().getNodeValue());%>
</td>
<td>
    <%out.println(Agency.item(i).getFirstChild().getNodeValue());%>
</td>
</tr>
<%
}
%>
</table>    </body>
</html>

