<?php
session_start();
include 'database.php';
if(isset($_SESSION['selectShop']) && isset($_SESSION['selectAllShop'])) 
        { 
            if ($_POST['submit']) { 
                $company = $_POST['company'];
                if($_POST['company'] == "allShop") {
                    $_SESSION['selectAllShop'] = $company;
                    $query = "SELECT * FROM product";
                    unset($_SESSION['selectShop']);
                    header("location: main.php"); 
                    
                }
                else { 
                    $query = "SELECT * FROM product where company='$company'";

                    $_SESSION['selectShop'] = $company;
                    unset($_SESSION['selectAllShop']);
                    header("location: main.php");
                }
            }
        }

    // if($_POST['submit']) {
    //     $company = $_POST['company'];

    //     if($_POST['company'] == "allShop") { 
    //         $_SESSION['selectAllShop'] = $company;
    //         $query = "SELECT * FROM product";
    //         header("location: main.php");
    //     }
    //     else {      
    //         $query = "SELECT * FROM product where company='$company'";

    //         $_SESSION['selectShop'] = $company;
    //         header("location: main.php");
    //     }
        
        
    // }
?>