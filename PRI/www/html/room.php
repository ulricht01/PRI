<?php
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';

$roomNumber = isset($_GET['roomNumber']) ? $_GET['roomNumber'] : null;

$data = getInfoPokoje($conn, $roomNumber);

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $cleaned = isset($_POST['cleaned-room']) ? 'Y' : 'N';
    $occupied = isset($_POST['occupied-room']) ? 'Y' : 'N';
    updateInfoRoom($conn, $cleaned, $occupied, $roomNumber);
    $data = getInfoPokoje($conn, $roomNumber);
}

?>
<body>
<div class="wrapper">
    <?php if ($data): ?>
        <div class="room-details">
            <div class="room-number-room">Pokoj: <?php echo htmlspecialchars($data[0]['cislo_pokoje']); ?></div>
            <div class="floor-room">Patro: <?php echo htmlspecialchars($data[0]['patro']); ?></div>
            <form method="POST" action="" class="form-room">
                <div class="form-group-room">
                    <label for="cleaned-room">
                        <input type="checkbox" id="cleaned-room" name="cleaned-room" <?php echo $data[0]['uklizeno'] == 'Y' ? 'checked' : ''; ?>>
                        Uklizeno
                    </label>
                    <label for="occupied">
                        <input type="checkbox" id="occupied-room" name="occupied-room" <?php echo $data[0]['obsazeno'] == 'Y' ? 'checked' : ''; ?>>
                        Obsazeno
                    </label>
                </div>
                    <button type="submit" id="submit-room" name="submit-room">Uložit</button>
            </form>
        </div>
    <?php else: ?>
        <div class="error">Pokoj nenalezen.</div>
    <?php endif; ?>
</div>
</body>
</html>

<?php require INC . '/end.php'; ?>