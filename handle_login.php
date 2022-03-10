<?php
session_start();
include ('database.php');
$username = $_POST['username'];
$password = $_POST['password']; 
$pg = "SELECT * FROM userr WHERE name = '$username' AND password ='$password'";


$result = pg_query($conn, $pg);
// var_dump($result);
// session_die();
$count = pg_num_rows($result);


$row = pg_fetch_array($result);// w3

if(pg_num_rows($result) >0){

    echo "I'm about to learn PHP!";
    $_SESSION['login_user'] = $row['name'];
    header("location: index.php");
}
else{
    echo '<script language="javascript">alert("Password or username incorrect !!! try again!!"); window.location="login.php";</script>';
}

/* 
$sql ="SELECT * FROM user WHERE name ='".$username."' AND password ='".$password."' ";
$result = pg_query($conn, $sql);

$count = pg_num_rows($result);

$row= pg_fetch_array($result);


if($count>0){
    $_SESSION['login_user']=$row['name'];
    header("location: index.php ");
}else{
    echo '<script language="javascript">alert("Password or username incorrect !!! try again!!"); window.location="login.php";</script>';
} */

?>




