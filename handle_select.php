<?php
session_start();
include 'database.php';
echo "hello";

    if($_POST['submit']) {
        $company = $_POST['company'];
        if($_POST['company'] == 'allShop') { 
            $query = "SELECT * FROM product";
            header("location: main.php");
        }
        else {
            // echo "hello";
            $query = "SELECT * FROM product where company='$company'";
            // echo $company;
            // $row = pg_fetch_array($result);

            $_SESSION['selectShop'] = $company;
            header("location: main.php");
        }
        
        
    }
?>