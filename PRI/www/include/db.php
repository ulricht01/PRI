<?php

$host = "database";
$user = "root";
$password_db = "root";
$dbname = "pri";


$conn = new mysqli($host, $user, $password_db, $dbname);

function test_connection($conn){
    if ($conn->connect_error) {
        echo"Rip";
    }
    else{
        echo"Juhuu";
    } 
}

function dbQuery(mysqli $conn, string $query): bool|mysqli_result
{
    return $conn->query($query);
}

function dbEscape(mysqli $conn, string $s): string
{
    return "'" . $conn->real_escape_string($s) . "'";
}

function login(mysqli $conn, string $username, string $password): bool
{
    $username = dbEscape($conn, $username);
    $password = dbEscape($conn, $password);

    $query = "SELECT id_recepcni FROM recepcni WHERE uz_jmeno=$username AND heslo=$password";

    $result = dbQuery($conn, $query);
    // num rows -> počet řádků v proměnné
    if ($result->num_rows > 0) {
        return true;
        }
    return false;
}

function infoPokoje(mysqli $conn): array
{
    $query = "SELECT * from pokoje";
    $result = dbQuery($conn, $query);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $data[] = $row;

        }
    }
    return $data;
}

function getInfoPokoje(mysqli $conn, string $id_pokoje): array
{
    $id_pokoje = dbEscape($conn, $id_pokoje);
    $query = "SELECT * FROM pokoje WHERE id_pokoje = $id_pokoje";
    $result = dbQuery($conn, $query);

    $data = [];
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;
}

function updateInfoRoom(mysqli $conn, string $cleaned, string $occupied, $id_pokoje){
    $cleaned = dbEscape($conn, $cleaned);
    $occupied = dbEscape($conn, $occupied);
    $id_pokoje = dbEscape($conn, $id_pokoje);

    $query = "UPDATE pokoje SET uklizeno=$cleaned, obsazeno=$occupied WHERE id_pokoje=$id_pokoje";
    dbQuery($conn, $query);
    downloadXML($conn);
}

function downloadXML(mysqli $conn){
    $sql = "SELECT * 
            FROM pokoje
            WHERE obsazeno = 'N'
            AND uklizeno = 'Y'";
    $result = $conn->query($sql);

// Zpracování výsledků do XML
if ($result->num_rows > 0) {
    $xml = new SimpleXMLElement('<seznam/>');
    
    while($row = $result->fetch_assoc()) {
        $item = $xml->addChild('pokoj');
        
        // Přidejte jednotlivé sloupce jako elementy
        foreach($row as $key => $value) {
            $item->addChild($key, htmlspecialchars($value));
        }
    }

    // Uložení XML do souboru
    $xml->asXML('xml/volne_pokoje.xml');

    echo 'Data byla úspěšně exportována do XML.';
} else {
    echo "Žádné výsledky.";
}
}

function downloadXML_recepcni(mysqli $conn){
    $sql = "SELECT * 
            FROM recepcni";
    $result = $conn->query($sql);

// Zpracování výsledků do XML
if ($result->num_rows > 0) {
    $xml = new SimpleXMLElement('<seznam/>');
    
    while($row = $result->fetch_assoc()) {
        $item = $xml->addChild('recepcni');
        
        // Přidejte jednotlivé sloupce jako elementy
        foreach($row as $key => $value) {
            $item->addChild($key, htmlspecialchars($value));
        }
    }

    // Uložení XML do souboru
    $xml->asXML('xml/recepcni.xml');

    
}
}

function validateXML($xml, $xsd){
    if ($xml->schemaValidate($xsd)) {
        $message = "XML je v pořádku.";
    } else {
        $message = "XML není v pořádku.";
    }
    return $message;
}

?>
