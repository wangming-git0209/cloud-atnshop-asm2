<?php 
    include('database.php');
        

        $id = $_GET['id'];
        $productName = $_POST['name'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $company = $_POST['company'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        
        $pg = "UPDATE product
        SET name = '$productName', image= '$image', category =' $category', price='$price' , company='$company', amount='$amount' WHERE id = $id";

        $result = pg_query($conn, $pg);
        if(isset($result)) {
            echo "oke";
        }
        else {echo "ngu";}
        header('location: main.php');
  

?>