<?php
session_start();
include 'database.php';

    if($_POST['submit']) {
        $company = $_POST['company'];
        
        $query = "SELECT * FROM product where company='$company'";

        $_SESSION['selectShop'] = $query; 

        header("location: main.php");
    }
?>