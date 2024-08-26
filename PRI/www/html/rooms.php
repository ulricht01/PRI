<?php
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';
$data = infoPokoje($conn);
$i = 1;
?>
<body>
<div class="wrapper">
    <div class="grid-container">
        <?php foreach ($data as $item): ?>
        <a class="grid-item" href="room.php?roomNumber=<?php echo $i++ ?>">
            <div class="room-number">Pokoj:<?php echo htmlspecialchars($item['cislo_pokoje']); ?></div>
            <div class="floor">Patro:<?php echo htmlspecialchars($item['patro']); ?></div>
            <div class="status">
                <div class="cleaned" data-uklizeno="<?php echo $item['uklizeno']?>">Uklizeno:<?php if ($item['uklizeno'] == 'Y')
                    {
                        echo "Ano";
                    }
                    else 
                    {
                        echo "Ne";
                    }?>
                </div>
                <div class="occupied" data-obsazeno="<?php echo $item['obsazeno']?>">Obsazeno:<?php if($item['obsazeno'] == 'Y')
                    {
                        echo "Ano";
                    }
                    else
                    {
                        echo "Ne";
                    }?>
                </div>  
            </div>
        </a>
        <?php endforeach; ?>
    </di>
</div> 
<script src="js/uklizeno.js"></script>
<script src="js/obsazeno.js"></script>
</body>
</html>


<?php require INC . '/end.php';