<?php
session_start();
include 'database.php';

    if($_POST['submit']) {
        $company = $_POST['company'];
        
        $query = "SELECT * FROM product where company='$company'";

        echo $company;
    
    }
?>