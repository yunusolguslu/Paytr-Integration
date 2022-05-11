<?php 
//direct to the login page
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}
else{
    header("location: shop.php");
}

?>