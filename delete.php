<?php 
    include('database.php');

    $id = $_GET['id'];
    $pg = "DELETE FROM product WHERE id='$id'";

    $result = pg_query($conn, $pg);
    header('location: main.php');
?>