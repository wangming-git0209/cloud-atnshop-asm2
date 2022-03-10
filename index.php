<?php 
    include('database.php');
    session_start();
    if(!isset($_SESSION['login_user'])){
    header('location:login.php');
    echo "check";
     }
    
    $products = [];
    $getCategoriesQuery = "SELECT DISTINCT category FROM product ORDER BY category ASC";
    $categoryResult = pg_query($conn, $getCategoriesQuery);
    
    $sql = "SELECT * FROM product";
    $result = pg_query($conn, $sql);
    while($row = pg_fetch_assoc($result)){
        array_push($products, $row);
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test1.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>CRAY•STUDIO</title>
    <style>
        /* reset css */
        *{
            padding: 0;
                margin: 0;
            box-sizing: border-box;
        }
        html{

            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
        }
        .searchandlogout a  {
            display: inline-block ;
            color: #fff;
            padding: 0 20px;
            text-decoration: none;
        }

        .searchandlogout li {
            list-style-type: none;
            display: inline-block;
        }
        #cha-subnav2{
            position: relative;
        }
        .subnav2  {
            
            position:absolute;
            top: 50px;
            right: 0px;
            width: 80px;
            padding: 5px 0;
            display: block;
            background-color: #fff;
        }
        .subnav2 li a {
            color: #000;
        }
        .subnav2 li  {
            padding: 5px 0;
        }

        .subnav2{
            display: none;
        }

        .searchandlogout i  {
            color: #fff;
            padding: 0 24px;
            line-height: 50px;
            text-decoration: none;
        }

        .searchandlogout li:hover  {
            background-color:#ccc ;

            color: #000;
        }
        .navbar_nav #cha-subnav2:hover  .subnav2{
            display: inline-block;
        }



        .searchandlogout {
            float: right;
            z-index: 1;
            
        } 
        .searchandlogout {
            display: flex;
        }

        #main {

        }
        #header {
        position: fixed;
        top:0;
        right: 0;
        left: 0;
        height: 50px;
        background-color: #000;
        z-index: 1;
        }
        #nav {
            display: inline-block;
        }

        #nav li {
        position: relative;
        }
        #nav .subnav{
            display: none;
            position: absolute;
            background-color: #fff;
            list-style-type: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        #nav> li{
            display: inline-block;
        }

        #nav> li> a {
            color: #fff;
            text-transform: uppercase;

        }

        #nav li a {
            display: block;
            text-decoration: none;
            line-height: 50px;
            padding: 0 24px;
        }

        #nav .subnav a {
            color: #000;
        }
        #nav li:hover .subnav {
            display: inline-block;
        }

        #nav> li:hover> a,
        #nav .subnav li:hover A{
            background-color:#ccc ;
            color: #000;
        }
        /* code slider */
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}

        /* Slideshow container */
        #slider {
        position: relative;
        margin-top: 50px;
        height: 90%;
        }

        #slider img{
        height: 70%;
        }
        /* The dots/bullets/indicators */
        .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #fff;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 10s;
        animation-name: fade;
        animation-duration: 10s;
        }
        @-webkit-keyframes fade {
        from {opacity: .9} 
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .9} 
        to {opacity: 1}
        }
        /* slider */

        /* content */
        .span_1_of_left {
            width:16.66%;
        }
        .rsidebar {
            display: block;
            height: 2300px;
            float: left;
            margin: 1% 3.5% 2% 3%;
        }
        .row1 {
            outline: none;
            padding: 20px;
            overflow: auto;
            height: 190px;
        }


        .sky-form h4{
            color: #555;
            font-size: 0.9em;
            padding: 5px 10px;
            background: #F7F7F7;
            border: 1px solid #E6E6E6;
            text-transform: uppercase;
        }

        .sky-form .input,
        .sky-form .select,
        .sky-form .textarea,
        .sky-form .radio,
        .sky-form .checkbox,
        .sky-form .toggle,
        .sky-form .button {
            position: relative;
            display: block;
        }

        /* radios and checkboxes */
        .sky-form .radio,
        .sky-form .checkbox {
            outline:none;
            border:none;
            margin-bottom: 4px;
            padding-left: 27px;
            font-size: 13px;
            line-height: 27px;
            color: #555555;
            cursor: pointer;
            text-transform: capitalize;
        }

        .sky-form .radio:last-child,
        .sky-form .checkbox:last-child {
            margin-bottom: 0;
        }
        .sky-form .radio input,
        .sky-form .checkbox input {
            position: absolute;
            left: -9999px;
        }
        .sky-form .radio i,
        .sky-form .checkbox i {
            position: absolute;
            top: 5px;
            left: 0;
            display: block;
            width: 18px;
            height: 18px;
            outline: none;
            border-width: 2px;
            border-style: solid;
            background: #fff;
        }
        .sky-form .radio i {
            border-radius: 50%;
        }
        .sky-form .radio input + i:after,
        .sky-form .checkbox input + i:after {
            position: absolute;
            opacity: 0;
            transition: opacity 0.1s;
            -o-transition: opacity 0.1s;
            -ms-transition: opacity 0.1s;
            -moz-transition: opacity 0.1s;
            -webkit-transition: opacity 0.1s;
        }

        .sky-form .radio input:checked + i:after,
        .sky-form .checkbox input:checked + i:after {
            opacity: 1;
        }

        .sky-form .inline-group .radio,
        .sky-form .inline-group .checkbox {
            float: left;
            margin-right: 30px;
        }
        .sky-form .inline-group .radio:last-child,
        .sky-form .inline-group .checkbox:last-child {
            margin-bottom: 4px;
        }
        .sky-form .checkbox input + i:after {
            content:'';
            top: 0px;
            left:-3px;
            width: 15px;
            height: 15px;
            background: url(./img/arrow.png);
            text-align: center;
        }
        .sky-form .checkbox input + i:after {
        color:#fff;
        }
        .sky-form .checkbox i{
            border-color:#E5E5E5;
        }
        .sky-form .radio input:checked + i,
        .sky-form .checkbox input:checked + i,
        .sky-form .toggle input:checked + i {
            border-color:#888;	
        }
        /* content */

        .list-img section{
            display: flex;
            flex-direction: row;
        flex-wrap: wrap;
        }

        .list-img section .item {
            width:25%;
            height: 330px;
        flex-wrap: wrap;
        
        }

        .list-img section .item:hover {
            border: 1px solid  #000;
            transform: .6s;
        }

        .list-img{
            margin-right: 50px;
        }

        section .item img{
        width: 254px;
        height: 279px;
        padding: 7px;
        }
        .title-list{
            display: inline-block ;
            /* text-align: center; */
            margin: 70px 0px 40px 10px;
            box-shadow: 0 10px rgba(254,254,254, 0.4);
            
        }
        .title-list h1 {
        color: #000;
        }
        section .item  p{
            font-family: Courier , 'Times New Roman', Times, serif;
            margin-left: 12px;
        }

        .admin{margin-top: 50px;
            width: 100%;
            height: 138px;
            background-color: #ede734;
            text-transform: uppercase;
            
        }


        .admin h1 {
            display: inline-block;
            padding: 50px 20px 50px 250px;
        }
        .admin a {
            position: relative;
            top: -7px;
            right: -20px;
            display: inline-block;
            background-color: #363738 ;
            color: #fff;
            font-family: Georgia, 'Times New Roman', Times, serif;
            padding: 10px;
            width: 130px;
            border-radius: 7px;
            text-align: center;
            text-decoration: none;
        }
        .admin .btn:hover,
        .admin .btn:active{
        color: #78797a;
        background-color: #363738 ;
        }
        .m_10{
            display: inline-block;
        }
        .sub_list {
            display: flex;
            justify-content: center;
        }

        .sub_list ul {
        padding: 40px 60px 0 60px;
        }

        .sub_list h4 {
            line-height: 40px;
        font-family: Georgia, 'Times New Roman', Times, serif;

        }

        .sub_list li {
        list-style-type: none;
        line-height: 30px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        }
        #footer {
        margin-top: 70px;
        padding-top: 10px;
        background-color:#363738;
        text-align: center;
        color: rgb(241, 239, 227);
        height: 50px;
        }

        #footer a{
        color: #fff;
        text-decoration: none;
        padding: 5px;
        }
        
        #footer p {
            color: #fff;
        }
    
    </style>
</head>
<body>
 <div id="main">
    <div id="header">
        <ul id="nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">ATN SHOP</a></li>
            
        </ul>
<div class="searchandlogout">
    <ul class="navbar_nav ">
        <li><i class="fas fa-search"></i></li>
        <li id="cha-subnav2"> <i class="fas fa-user"></i>                 
            <ul class="subnav2">
                <li><a href="login.php">Login</a></li>
                <li><a href="logup.php">Logup</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>  
    </ul>
</div> 
    </div>

    <div id="slider">
        <div class="mySlides fade">
            <img src="./img/header4.jpg" style="width:100%">
          </div>
          
          <div class="mySlides fade">
            <img src="./img/header5.jpg" style="width:100%">
          </div>
          
          <div class="mySlides fade">
            <img src="./img/header6.jpg" style="width:100%">
          </div>
          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
          </div>

          <script>
            var slideIndex = 0;
            showSlides();
            
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 9000); // Change image every 2 seconds
            }
            </script>
    </div>

    <div id="content">
        <div class="wrap-colum2">
            <div  class="rsidebar span_1_of_left">
                <section  class="sky-form">
                        <h4>Category</h4>
                        <div class="row row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="radio" name="checkbox" checked=""><i></i>Tee</label>
                            </div>
                        </div>
                    
            </div>
        </div>
        <div class="list-img">
            <?php  while($categoryName = pg_fetch_assoc($categoryResult)) {?>
                <div  class="title-list">  <h1><?php echo $categoryName['category'] ?></h1> </div>
                <section>
                    <?php foreach($products as $product) { ?>           
                        <?php if($product['category'] == $categoryName['category']) { ?>
                            
                                <div class=" item ">
                                    <img src="./img/<?php echo $product['image'] ?>" alt="">
                                    <p><?php echo $product['name'] ?></p>
                                    <p><?php echo $product['price'] ?></p>
                                </div>
                            
                        <?php } ?>
                    <?php } ?>
                </section>
            <?php } ?>
        </div>
    </div> 

  <div class="admin">
    <h1>Log in to the admin page</h1>
    <a href="admin.php" class="btn btn-success">ADMIN</a>
  
    </div>
    </div>
    <div id="footer">
        <div class="copy">
            <div class="wrap">
                <p>All Rights Reserved | Designed by Nguyen Ngoc Quang Minh</a></p>
            </div>
          </div>
    </div>
</div> 
</body>
</html>