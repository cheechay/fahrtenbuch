<?xml version="1.0" encoding="UTF-8"?>
 <xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- Apply to the root element -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Fahrtenbuch</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        padding: 10px;
                        border: 1px solid #ddd;
                        text-align: left;
                    }
                    th {
                        background-color:#54565865;
                    }

                </style>
            </head>
            <body>
                <h1>Fahrtenbuch Übersicht</h1>
                <table>
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>WOHNORT</th>
                            <th>ZWECK</th>
                            <th>DATUM</th>
                            <th>UHRZEIT VON</th>
                            <th>UHRZEIT BIS</th>
                            <th>KM START</th>
                            <th>KM END</th>
                            <th>KM DIFF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through each entry -->
                        <xsl:for-each select="fahrtenbuch/entry">
                            <tr>
                                <td><xsl:value-of select="name"/></td>
                                <td><xsl:value-of select="wohnort"/></td>
                                <td><xsl:value-of select="Zweck"/></td>
                                <td><xsl:value-of select="Datum"/></td>
                                <td><xsl:value-of select="Uhrzeit_von"/></td>
                                <td><xsl:value-of select="Uhrzeit_bis"/></td>
                                <td><xsl:value-of select="Kmstart"/></td>
                                <td><xsl:value-of select="Kmend"/></td>
                                <td><xsl:value-of select="Kmdiff"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
