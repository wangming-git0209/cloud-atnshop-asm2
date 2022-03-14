<?php
session_start();
include 'database.php';

$chooseShop = $_POST['company'];


if (isset($_POST['submit'])) { 
   
            if($chooseShop=='shop_1'){
                $_SESSION['selectShop']='shop_1';

                header("location: main.php");
                

            }else if($chooseShop=='shop_2'){
                $_SESSION['selectShop']='shop_2';
                header("location: main.php");
            }else{
                $_SESSION['selectShop']='allShop';
                header("location: main.php");
              
            }
        
        }

        
            
    ?>
        
            

        