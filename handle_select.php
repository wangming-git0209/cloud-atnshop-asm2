<?php
session_start();
include 'database.php';
echo "hello";

    if($_POST['submit']) {
        $company = $_POST['company'];
        echo "hello";
        $query = "SELECT * FROM product where company='$company'";
        echo $company;
        // $row = pg_fetch_array($result);

        $_SESSION['selectShop'] = $company;
        header("location: main.php");
    }
?>