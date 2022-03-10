<?php 
    include('database.php');
    $pg = "SELECT * FROM product";
    $result = pg_query($conn, $pg);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php while($row = pg_fetch_assoc($result)) {?>
           
           if(  $row['category'] == 'sale' ) {
            <img src="./img/<?php echo $row['image']?>" alt="img">
                <p>  <?php echo $row['name']?></p>
                  <p><?php echo $row['price']?></p>
           }
                
                
                
              
          <?php } ?>
          <?php echo $row['category']?>
</body>
</html>