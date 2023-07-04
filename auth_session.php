<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","rempah");
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>