<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:decimal-format name="euro" decimal-separator="," grouping-separator="."/>
  <xsl:output method = "html"></xsl:output>
  <xsl:template match="/">
  <html>
  <body>
    <h2 class="header">My CD Collection</h2>
    <p>Total students: <xsl:value-of select="report/statistics/totalstudents"/></p>
    <p>Total average: <xsl:value-of select="report/statistics/totalaverage"/></p>
    <table class="table">
      <tr >
        <th>Name</th>
        <th>Last Name</th>
        <th>Total class</th>
        <th>average</th>
      </tr>
      <xsl:for-each select="report/student">
        <tr>
          <td><xsl:value-of select="name"/></td>
          <td><xsl:value-of select="lastname"/></td>
          <td><xsl:value-of select="completed"/></td>
          <td><xsl:value-of select="average"/></td>
        </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>
