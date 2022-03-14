<?php
session_start();
include 'database.php';

    if($_POST['submit']) {
        $company = $_POST['company'];
        echo "hello";
        $query = "SELECT * FROM product where company='$company'";
        $row = pg_fetch_array($result);

        $_SESSION['selectShop'] = $row['company']; 

        header("location: main.php");
    }
?>