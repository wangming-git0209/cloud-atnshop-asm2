<?php
session_start();
include 'database.php';

$chooseShop = $_POST['company'];
$sql = "SELECT * FROM product";
    //
    $result = pg_query($conn, $sql);

if ($_POST['submit']) { 
    /* if(isset($_SESSION['selectShop']) && isset($_SESSION['selectAllShop'])) 
        { 
                $company = $_POST['company'];
                if($_POST['company'] == "allShop") {

                    $_SESSION['selectAllShop'] = $company;
                    unset($_SESSION['selectShop']);
                    
                    header("location: main.php"); 

                    
                }
                else { 
                    $query = "SELECT * FROM product where company='$company'";

                    $_SESSION['selectShop'] = $company;
                    unset($_SESSION['selectAllShop']);
                    header("location: main.php");
                }
            } */
            if($chooseShop=='shop_1'){
                $_SESSION['selectShop']='shop_1';
                

            }else if($chooseShop=='shop_2'){
                $_SESSION['selectShop']='shop_2';
            }else{
                while($row = pg_fetch_assoc($result)) 
            {
            ?> 
                <tr>
                
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['company']?></td>
                <td><img src="./img/<?php echo $row['image']?>" alt="img" width="250" height="250"></td>
                <td><?php echo $row['category']?></td>
                <td><?php echo $row['amount']?></td>
                <td><?php echo $row['price']?></td>
                <td>
                <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update </a>
                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete </a>
                </td>
            </tr> 
                
            <?php
            }
            }
        
        }

        $selectShop =  $_SESSION['selectShop'];
        $sql_selectShop = "SELECT * FROM product where company='$selectShop'";
        $result_select = pg_query($conn, $sql_selectShop);

            if(isset($_SESSION['selectShop'])){
                while($row = pg_fetch_assoc($result_select)) {
                    ?>  
                        <tr>
                       
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['company']?></td>
                        <td><img src="./img/<?php echo $row['image']?>" alt="img" width="250" height="250"></td>
                        <td><?php echo $row['category']?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><?php echo $row['price']?></td>
                        <td>
                        <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update </a>
                        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete </a>
                        </td>
                    </tr> 
                    <?php
            }
        }
            ?>
        
            

        