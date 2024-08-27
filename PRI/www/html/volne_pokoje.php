<?php
ob_start();
session_start();
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
}

$xmlstr = file_get_contents('xml/volne_pokoje.xml');

// Vytvoření SimpleXMLElement objektu z XML řetězce
$data = new SimpleXMLElement($xmlstr);

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
<?php 
require INC . '/end.php';
ob_end_flush();
?>