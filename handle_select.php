<?php
session_start();
include 'database.php';
echo "hello";

    if($_POST['submit']) {
        $company = $_POST['company'];
        if($_POST['company'] == "allShop") { 
            $_SESSION['selectAllShop'] = $company;
            $query = "SELECT * FROM product";
            header("location: main.php");
        }
        else {      
            $query = "SELECT * FROM product where company='$company'";

            $_SESSION['selectShop'] = $company;
            header("location: main.php");
        }
        
        
    }
?>