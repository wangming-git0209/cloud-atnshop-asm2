<?php 
session_start();
if(session_destroy()) {
    // Here is destroy session. After that redirect to login page 
    header("location: login.php");

}
?>