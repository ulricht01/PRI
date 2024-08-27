<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
        <head>
            <title>Seznam recepčních</title>
            <style>
                h1{
                    font-family: monospace;
                    text-align: center;
                }
                table {
                    margin: 5%;
                    font-family: monospace;
                }
                table :hover{
                    scale: 1.03;
                    transition: 0.5s;
                }
                table th {
                    background-color: #33333391;
                    width: 5%;
                    font-size: 15px;
                    color: white;
                }
                table td {
                    background-color: #facdcd;
                    text-align: center;
                    font-size: 12px;
                }                
            </style>
        </head>
        <body>
            <h1>Seznam recepčních</h1>
            <table>
                <tr>
                    <th>ID recepčního</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Uživatelské jméno</th>
                </tr>
                <xsl:for-each select="seznam/recepcni">
                    <tr>
                        <td><xsl:value-of select="id_recepcni"/></td>
                        <td><xsl:value-of select="jmeno"/></td>
                        <td><xsl:value-of select="prijmeni"/></td>
                        <td><xsl:value-of select="uz_jmeno"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </body>
        </html>
    </xsl:template>
</xsl:stylesheet>