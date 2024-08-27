<?php
ob_start();
session_start();
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';

downloadXML_recepcni($conn);

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
}

// Cesty k souborům
$xmlFile = 'xml/recepcni.xml';
$xslFile = 'xml/xslt/recepcni.xsl';
$xsdFile = 'xml/xsd/recepcni.xsd';

// Načtěte XML a XSLT dokumenty
$xml = new DOMDocument;
$xml->load($xmlFile);

$message = validateXML($xml, $xsdFile);
if ($message !== ""): ?>
    <div id="message-recepcni">
        <p><?php echo $message; ?>
    </div>
    <?php endif;

$xsl = new DOMDocument;
$xsl->load($xslFile);

// Vytvořte XSLTProcessor a připojte XSLT
$proc = new XSLTProcessor;
$proc->importStylesheet($xsl);

// Proveďte transformaci
$html = $proc->transformToXML($xml);

// Zobrazte výstup
header('Content-Type: text/html; charset=UTF-8');
echo $html;
?>

<script src="js/message-recepcni.js"> </script>
<?php 
require INC . '/end.php';
ob_end_flush();
?>
