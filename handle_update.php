<?php 
    include('database.php');
        
   

        $id = $_GET['id'];
        $productName = $_POST['name'];
        $company = $_POST['company'];
        $amount = $_POST['amount'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        
        $pg = "UPDATE product SET name = '$productName', image= '$image', category =' $category', price='$price', company='$company', amount='$amount'
        WHERE id = $id";

        $result = pg_query($conn, $pg);

        $count = pg_num_rows($result);


        $row = pg_fetch_array($result);
        header('location: main.php');
    
  

?>