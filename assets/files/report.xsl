<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method = "html"></xsl:output>
  <xsl:template match="/">

  <!-- Μεταβλητή για το μέγιστο βαθμό -->
  <xsl:variable name="max">
    <xsl:for-each select="report/student/average">
      <xsl:sort select="." data-type="number" order="descending"/>
      <xsl:if test="position() = 1"><xsl:value-of select="."/></xsl:if>
    </xsl:for-each>
  </xsl:variable>

  <!-- Μεταβλητή για το δεύτερο μέγιστο βαθμό -->
  <xsl:variable name="second">
    <xsl:for-each select="report/student/average">
      <xsl:sort select="." data-type="number" order="descending"/>
      <xsl:if test="position() = 2"><xsl:value-of select="."/></xsl:if>
    </xsl:for-each>
  </xsl:variable>

  <!-- Μεταβλητή για το μέσο όρο όλων των μαθητών -->
  <xsl:variable name="avg">
    <xsl:value-of select="sum(report/student/average) div count(report/student)"/>
  </xsl:variable>

    <html>
      <body>
        <main class="main">
          <div class="profile__main">
            <div class="profile__statistics">
              <h3 class="subtitle">Στοιχεία XML</h3>
              <div class="statistics__container">
                <div class="statistics__box single__text">
                  <img class="box__image" src="./assets/icons/st-1.png" alt="icon" />
                  <span class="box__title">Εξάμηνο</span>
                  <span class="box__number"><xsl:value-of select="report/semester"/></span>
                </div>
                <div class="statistics__box single__text ml-2">
                  <img class="box__image" src="./assets/icons/st-5.png" alt="icon" />
                  <span class="box__title">Αριθμός Μαθητών</span>
                  <span class="box__number"><xsl:value-of select="count(report/student)"/></span>
                </div>
                <div class="statistics__box ml-2">
                  <img class="box__image" src="./assets/icons/st-8.png" alt="icon" />
                  <span class="box__title">Συνολικός Μέσος Όρος</span>
                  <span class="box__number"><xsl:value-of select='format-number($avg, "#.#")'/></span>
                </div>
              </div>
            </div>
            <div class="profile__statistics">
              <h3 class="subtitle">Πίνακας Μαθητών</h3>
              <table class="table table__dashboard">
                <tr>
                  <th>Επίθετο</th>
                  <th >Όνομα</th>
                  <th class="width-10">Μαθήματα</th>
                  <th class="width-10">Μέσος όρος</th>
                </tr>
                <xsl:for-each select="report/student">
                <xsl:sort select="lastname"/>
                <tr>
                  <xsl:attribute name="class">
                    <xsl:if test="average = $max">success</xsl:if>
                    <xsl:if test="average = $second">success</xsl:if>
                  </xsl:attribute>
                  <td><xsl:value-of select="lastname"/></td>
                  <td><xsl:value-of select="name"/></td>
                  <td><xsl:value-of select="completed"/></td>
                  <td><xsl:value-of select="average"/></td>
                </tr>
              </xsl:for-each>
            </table>
          </div>
        </div>
          </main>
        </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
