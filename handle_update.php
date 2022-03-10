<?php 
    include('database.php');
        

        $id = $_GET['id'];
        $productName = $_POST['name'];
        $company = $_POST['company'];
        $amount = $_POST['amount'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        
        $pg = "UPDATE product
        SET name = '$productName', image= '$image', category =' $category', price='$price' , amount='$amount', company='$company' 
        WHERE id = $id";

        $result = pg_query($conn, $pg);
        header('location: main.php');
  

?>