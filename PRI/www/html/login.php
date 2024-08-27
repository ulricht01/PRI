<?php
ob_start();
session_start();
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $username = $_POST['input-username'];
    $password = $_POST['input-password'];
    $login = login($conn, $username, $password);
    if ($login){
        $_SESSION['username'] = $username;
        header("Location: rooms.php");
        exit;
    }
    else{
        $message = "Neúspěšné přihlášení!";
    };
};
?>

<?php if ($message !== ""): ?>
<div id="message-login">
    <p><?php echo $message; ?>
</div>
<?php endif; ?>

</div>
<div class="login-form-div">
<form method="POST" class="login-form">
    <label for="input-username">Uživatelské jméno </label>
    <input type="text" id=input-username name="input-username">
    <label for="input-password">Heslo</label>
    <input type="password" id=input-password name="input-password">
    <button type="submit" id="submit-button" name="submit-button">Přihlásit</button>
</form>
</div>
<script src="js/message-login.js"> </script>
<?php 
require INC . '/end.php';
ob_end_flush();
?>