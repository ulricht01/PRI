<?php 
session_start();
if (isset($_SESSION["username"])){

    unset($_SESSION["username"]);
    header("Location: login.php");
    exit;
}
else{
    header($_SERVER["SERVER_PROTOCOL"]. "404 Not Found", true,404);
}
?>