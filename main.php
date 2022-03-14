<?php 
    include('database.php');
    $selectShop =  $_SESSION['selectShop'];
    $selectAllShop = $_SESSION['selectAllShop'];
    $sql = "SELECT * FROM product";
    $sql_selectShop = "SELECT * FROM product where company='$selectShop'";
    $result = pg_query($conn, $sql);
    $result_select = pg_query($conn, $sql_selectShop);
    if(isset($_SESSION['selectShop']) && isset($_SESSION['selectAllShop'])) 
        { 
            if ($_POST['submit']) { 
                $company = $_POST['company'];
                if($_POST['company'] == "allShop") { 
                    unset($_SESSION['selectShop']);
                    
                }
                else { 
                    unset($_SESSION['selectAllShop']);
                }
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="./styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">A T N SHOP</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">login</a>
                        <a class="dropdown-item" href="#">Logup</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> Home
                            </a>
                            <!-- <a class="nav-link collapsed" href="create_product.php"  data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Create New product
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Product</h1>

                        <form action="handle_select.php" method="POST" >
                        <div class="form-group">
                            <br>
                        <label>Choose shop:</label>
                        <select name="company">
                        
                                <option value="shop_1">shop_1</option> 
                                <option value="shop_2">shop_2</option> 
                                <option value="allShop">All shop</option> 


                        </select>
                        <input type="submit" name="submit">
                        </div>
                        </form>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable   
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Shop Name</th>
                                                <th>Images</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>More</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>                             
                                        <?php 
                                            if(isset($_SESSION['selectShop'])) {
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
                                            // unset($_SESSION['selectShop']);

                                            if(isset($_SESSION['selectAllShop'])) 
                                            { 
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
                                            // unset($_SESSION['selectAllShop']);
                                            

                                            if(!isset($_SESSION['selectAllShop']) && !isset($_SESSION['selectShop'])) {
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

                                            
                                            
                                       ?> 
                                            
                           
                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
