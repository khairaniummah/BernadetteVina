<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/Gym">
    <html>
    <body>
	<center>
       
            <table border="1">
				<xsl:for-each select="*">
            <tr>
				<xsl:if test="position()='1' or position()='5' or position()='9'">
				<xsl:value-of select="translate(name(.), 'abcdefghijklnmopqrstuvwxyz', 'ABCDEFGHIJKLNMOPQRSTUVWXYZ')"/>     
				</xsl:if>
            </tr>
            
			<tr>
            <xsl:if test="position()='1' or position()='5' or position()='9'">
                <xsl:for-each select="*">
                <th><xsl:value-of select="name(.)"/></th>
                </xsl:for-each>
				</xsl:if>
            </tr>
            <tr>        
            <xsl:for-each select="*">   
                <th>            
                <xsl:value-of select="."/>
                </th>
            </xsl:for-each>
            </tr>
			 </xsl:for-each>
            </table>
            <p></p>
    </center>   
    </body>
    </html>
</xsl:template>
</xsl:stylesheet>