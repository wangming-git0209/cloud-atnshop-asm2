<?php 
    include('database.php');
        

        $id = $_GET['id'];
        $productName = $_POST['name'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        
        $pg = "UPDATE product
        SET name = '$productName', image= '$image', category =' $category', price='$price'
        WHERE id = $id";

        $result = pg_query($conn, $pg);
        header('location: main.php');
  

?>