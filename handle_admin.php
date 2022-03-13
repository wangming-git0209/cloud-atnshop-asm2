<?php
session_start();
include 'database.php';
$username = $_POST['username']; 
$password = $_POST['password']; 
/* $pg = "SELECT * FROM admin where name = '".$username."' AND password ='".$password."'";

$result = pg_query($conn, $sql);
// var_dump($result);
// die();
$count = pg_num_rows($result);
$row = pg_fetch_assoc($result);// w3

if($count == 0){
    header('location: admin.php');
    
}
else{
    $_SESSION['login_user'] = $row['name'];
    header('location: main.php');
} */

$pg = "SELECT * FROM admin WHERE name = '$username' AND password ='$password'";
$selectProduct = $sql = "SELECT * FROM product WHERE company= '$username' "; 
$result = pg_query($conn, $pg);
$result2 = pg_query($conn, $selectProduct);

// var_dump($result);
// session_die();
$count = pg_num_rows($result);


$row = pg_fetch_array($result);

if($username == 'shop_1' || $username == 'shop_2')
    {
        $_SESSION['login_user'] = $row['name'];
        header("location: shop.php");
        
    }

if($username == 'admin') {
    if(pg_num_rows($result) >0){

        $_SESSION['login_user'] = $row['name'];
        header("location: main.php");
    }
    else{
        echo '<script language="javascript">alert("Password or username incorrect !!! try again!!"); window.location="login.php";</script>';
    }
}

  



// w3



?>