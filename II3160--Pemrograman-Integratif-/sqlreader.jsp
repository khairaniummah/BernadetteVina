<!Aditya Pradita S. (18211001)>
<!Rakaputra (18211059)>
<!Kode diambil dari http://congnghejava.blogspot.com/2013/02/24-jsp-database-access.html dengan beberapa perubahan untuk menyesuaikan dengan database yang kami buat>

<%@ page import="java.io.*,java.util.*,java.sql.*"%>
<%@ page import="javax.servlet.http.*,javax.servlet.*" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql"%>
 
<html>
<head>
<title>Data Juri</title>
</head>
<body>
 
<sql:setDataSource var="snapshot" driver="com.mysql.jdbc.Driver"
     url="jdbc:mysql://localhost/Juri"
     user="root"  password="ashburton"/> 
 
<sql:query dataSource="${snapshot}" var="result">
SELECT * from Juri;
</sql:query>
 
<table border ="1">
<tr>
   <th>No</th>
   <th>Nama</th>
   <th>Akreditasi</th>
   <th>Kategori</th>
</tr>
<c:forEach var="row" items="${result.rows}">
<tr>
   <td><c:out value="${row.No}"/></td>
   <td><c:out value="${row.Nama}"/></td>
   <td><c:out value="${row.Akreditasi}"/></td>
   <td><c:out value="${row.Kategori}"/></td>
</tr>
</c:forEach>
</table>
 
</body>
</html>
