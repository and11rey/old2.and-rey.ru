<?xml version="1.0" encoding="utf-8" ?>
<!-- XSL for and-rey.ru RSS archive http://www.and-rey.ru/newsline/ -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="xmlrss/channel">
    <html>
      <head>
        <title>
          <xsl:value-of select="title"/>
        </title>
        <link rel="stylesheet" type="text/css" href="/css/a.css"/>
        <script type="text/javascript">
          var pubDate = '<xsl:value-of select="pubDate"/>';
        </script>
        <script type="text/javascript" src="news.js"></script>
      </head>
      <body>
        <table width="700" border="0" align="center">
          <tr>
            <td align="left" width="20%">
              <br/>
            </td>
            <td align="center" width="60%">
              <br/>
              -= Это <a href="http://www.and-rey.ru/newsline/">архив новостей</a> and-rey.ru (ведется с 01 июля 2007 года) =-
            </td>
            <td align="right" width="20%">
              <br/>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <br/>
              <a href="{image/link}" alt="[{image/title}]" title="{image/title}">
                <img src="{image/url}" border="0"/>
              </a>
              <h3>
                <xsl:value-of select="title"/>
              </h3>
              <xsl:value-of select="description"/>
              <div align="right">
                <font color="#336699">
                  <b>
                    <xsl:value-of select="pubDate"/>
                  </b>
                </font>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <xsl:for-each select="item">
                <p>
                  <b>
                    <a href="{link}" target="_blank">
                      <xsl:value-of select="title"/>
                    </a>
                  </b>
                  <br/>
                  <xsl:value-of select="description"/>
                  <br/>
                  <font color="#336699">
                    <xsl:value-of select="pubDate"/>
                  </font>
                  &#xA0;&#xA0;&#xA0;
                  <font color="#C0C0C0">
                    <b>
                      [<xsl:value-of select="source"/>]
                    </b>
                  </font>
                </p>
              </xsl:for-each>
            </td>
          </tr>
          <tr>
            <td colspan="3" align="center">
              <br/>***
            </td>
          </tr>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>