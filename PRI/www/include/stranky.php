<?php
// Ověření existence session proměnné
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    $pages = [
        '/' => 'Home',
        '/login.php' => 'Přihlášení',
    ];
} else {
    $pages = [
        '/rooms.php' => 'Pokoje',
        '/volne_pokoje.php' => "Volné pokoje",
        'recepcni.php' => "Recepční",
        '/logout.php' => 'Odhlásit',
    ];
}
?>