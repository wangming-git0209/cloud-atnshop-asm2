<?php 
    include('database.php');
    $nameShop = $_SESSION['login_user'];

        $id = $_GET['id'];
        $productName = $_POST['name'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $company = $_POST['company'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        
        $pg = "UPDATE product
        SET name = '$productName', image= '$image', category =' $category', price='$price' , company='$nameShop', amount='$amount' WHERE id = $id";

        $result = pg_query($conn, $pg);
        
        header('location: shop.php');
   
?>