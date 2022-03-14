<?php 
    include('database.php');
    $nameShop = $_SESSION['login_user'];

    if(isset($_POST['submit']) ) {
       
        $productName = $_POST['name'];  
        $amount = $_POST['amount'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        
        $pg = "INSERT INTO product (company, name, image, category, price, amount) VALUES ('$nameShop', '$productName', '$image', '$category', '$price', '$amount')";

        $result = pg_query($conn, $pg);

        $count = pg_num_rows($result);


        $row = pg_fetch_array($result);
        header("location: shop.php");
    }

?>