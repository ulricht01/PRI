<?php
ob_start();
session_start();
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
}


$xmlFile = 'xml/volne_pokoje.xml';
$xsdFile = 'xml/xsd/volne_pokoje.xsd';
$xmlstr = file_get_contents('xml/volne_pokoje.xml');

$xml = new DOMDocument;
$xml->load($xmlFile);

$message = validateXML($xml, $xsdFile);
$message = validateXML($xml, $xsdFile);
if ($message !== ""): ?>
    <div id="message-volne-pokoje">
        <p><?php echo $message; ?>
    </div>
    <?php endif;
// Vytvoření SimpleXMLElement objektu z XML řetězce
$data = new SimpleXMLElement($xmlstr);
?> 
<h1>Seznam volných pokojů</h1>
<?php
foreach ($data->pokoj as $pokoj){
echo "<table class='table-volne-pokoje'>
  <tr>
    <th>Číslo pokoje</th>
    <th>Patro</th>
    <th>Lůžka</th>
  </tr>
  <tr>
    <td>$pokoj->cislo_pokoje</td>
    <td>$pokoj->patro</td>
    <td>$pokoj->luzka</td>
  </tr>
</table>";
}
?>
<script src="js/message-volne-pokoje.js"> </script>
<?php 
require INC . '/end.php';
ob_end_flush();
?>