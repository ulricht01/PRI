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
        '/logout.php' => 'Odhlásit',
    ];
}
?>