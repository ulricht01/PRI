# 1.1 Značkovací jazyk XML 
- XML = <b>eXtensible Markup Language</b>
- Je to standard pro počítačová data, které je možné vyměňovat mezi různými platformami
- Nepoužívá předdefinované tagy
- Uchovává data ve formé čistého textu
````
<note>
  <to>Tove</to>
  <from>Jani</from>
  <heading>Reminder</heading>
  <body>Don't forget me this weekend!</body>
</note>
````
## Element
- Vše v XML je element
- Element může obsahovat
  - Text
  - Attributy
  - Jiné elementy
  - Mix všeho zmíněného
- Elementy budeme používat jako informace pro čtenáře a atributy pro aplikaci, kterou XML soubor zpracovává
- Pravidla při pojmenování elementů
    1) <b>Case-Sensitive</b>
    2) <b>Začínají písmenem nebo podtržítkem</b>
    3) <b>Nesmí začínat 'xml'</b>
    4) <b>Nesmějí obsahovat mezery</b>
````
<bookstore>
  <book category="children">
    <title>Harry Potter</title>
    <author>J K. Rowling</author>
    <year>2005</year>
    <price>29.99</price>
  </book>
  <book category="web">
    <title>Learning XML</title>
    <author>Erik T. Ray</author>
    <year>2003</year>
    <price>39.95</price>
  </book>
</bookstore>
````
- XML elementy mohou mít stejné názvy, ale zcela jiný význam -> elementy by se mohli plést
  - Pro takový případ můžeme k elemetům přidat prefix
````
<h:table>
  <h:tr>
    <h:td>Apples</h:td>
    <h:td>Bananas</h:td>
  </h:tr>
</h:table>

<f:table>
  <f:name>African Coffee Table</f:name>
  <f:width>80</f:width>
  <f:length>120</f:length>
</f:table>
````
## Well-Formed XML
- XML představuje velice jednoduchý formát kódu, jelikož je struktura téměř celá na vás
- Existuje pouze pár pravidel XML syntaxe pro považování za Well-Formed
  1) <b>Musí obsahovat kořenový element (nemá sourozence, pouze děti)</b>
  2) <b>Prolog (specifikování kódování) musí být prvním řádkem souboru</b>
  3) <b>Elementy musí být uzavřené (Kromě prologu)</b>
  4) <b>Značky jsou Case-Sensitive</b>
  5) <b>Elementy musí být řádně zanořené, nesmí se křížit</b>
  6) <b>Hodnoty atributů musí být v uvozovkách</b>
  7) <b>Znaky jako <, & mají speciální význam, proto se musí vkládat jako &lt, &amp</b>
  8) <b>Komentáře <!-- ... --> nesmí obsahovat dvě pomlčky jinde, než na konci komenáře</b>
  9) <b>Bílé znaky nejsou ořezávány</b>
  10) <b>Přechod na nový řádek je pomocí znaku LF (line feed) - Na to je nutné si dát pozor ve Windows</b>
- Pro otestování Well-Formed můžeme použít třeba https://www.w3schools.com/xml/xml_validator.asp</b>
## Návrh XML Stromu
- XML nemá definovaný standardní model pro grafickou reprezentaci
- Jako jednoduchý model pro naše účely budeme používat <br>
![alt text](https://github.com/ulricht01/PRI/blob/main/XML%20Tree.png)
## Validní XML
- XML Soubor by měl být validní -> Měl by se řídit strukturou DTD (Document Type Definition) nebo XML Schema (Novější typ šablony)
````
<!DOCTYPE note
[
<!ELEMENT note (to,from,heading,body)>
<!ELEMENT to (#PCDATA)>
<!ELEMENT from (#PCDATA)>
<!ELEMENT heading (#PCDATA)>
<!ELEMENT body (#PCDATA)>
]>
````
- #PCDATA znamená <b>"Parseable Character Data"</b>
- XML nevyžaduje DTD
# Zdroje
https://www.w3schools.com/
https://github.com/JanBurle/UJEP/tree/main/KI-PRI
