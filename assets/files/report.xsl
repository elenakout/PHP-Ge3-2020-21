<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method = "html"></xsl:output>
  <xsl:template match="/">

  <xsl:variable name="max">
    <xsl:for-each select="report/student/average">
      <xsl:sort select="." data-type="number" order="descending"/>
      <xsl:if test="position() = 1"><xsl:value-of select="."/></xsl:if>
    </xsl:for-each>
  </xsl:variable>

  <xsl:variable name="second">
    <xsl:for-each select="report/student/average">
      <xsl:sort select="." data-type="number" order="descending"/>
      <xsl:if test="position() = 2"><xsl:value-of select="."/></xsl:if>
    </xsl:for-each>
  </xsl:variable>

    <html>
      <body>
        <main class="main">
          <h2 class="header">Students</h2>
          <p>Total students: <xsl:value-of select="report/statistics/totalstudents"/></p>
          <p>Total average: <xsl:value-of select="report/statistics/totalaverage"/></p>
          <p>Max: <xsl:value-of select="$max"/></p>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Last Name</th>
              <th>Total class</th>
              <th>average</th>
            </tr>
            <xsl:for-each select="report/student">
            <xsl:sort select="lastname"/>
            <tr>
              <xsl:attribute name="class">
                <xsl:if test="average = $max">green</xsl:if>
                <xsl:if test="average = $second">green</xsl:if>
              </xsl:attribute>
              <td><xsl:value-of select="lastname"/></td>
              <td><xsl:value-of select="name"/></td>
              <td><xsl:value-of select="completed"/></td>
              <td><xsl:value-of select="average"/></td>
            </tr>
            </xsl:for-each>
          </table>
        </main>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
