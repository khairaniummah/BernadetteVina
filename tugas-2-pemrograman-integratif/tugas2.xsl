<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match ="/" >
    <html>
      <head>
        <title>Mahasiswa</title>
      </head>
      <body>
        <xsl:apply-templates />
      </body>
    </html>
</xsl:template>

<xsl:template match="table" >
    <table border="1">
        <tr bgcolor="lightblue">
            <td>NIM</td>
            <td>Nama</td>
            <td>Nilai</td>
        </tr>
<xsl:for-each select="mahasiswa" >
        <tr>
            <td> <xsl:value-of select="@NIM"/></td>
            <td> <xsl:value-of select="nama"/></td>
            <td> <xsl:value-of select="nilai"/></td>
        </tr>
</xsl:for-each>
     </table>
</xsl:template >
</xsl:stylesheet >