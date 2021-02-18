<?php
require('connection.php');
require('function.php');

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] !='')
{
}
else
{
  header('location:login.php');
  die();
}
?>
 <!doctype html>
 <html class="no-js" lang="">
 <meta http-equiv="content-type"content="text/html;charset=UTF-8"/>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Admin Login Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <style>
   h4
   {
       margin-left:15px;
       padding-bottom: 5px;
   }
   .nav-item
   {
     padding: 0 40px;
   }
   .navbar
   {
     height: 85px;
   }
   .vertical-menu {
  width: 200px;
  margin-top: 3%;
  margin-left: 30px;
}
.vertical-menu a {

  color: black;
  display: block;
  padding: 20px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: grey;
  color: #fff;
}

   </style>
 </head>
 <body>
   <nav class="navbar bg-secondary navbar-expand-md navbar-dark">
       <a class="navbar-brand" href="">WELCOME ADMIN</a>
       <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#tog" aria-controls="#tog" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="tog" >
       <ul class="navbar-nav ml-auto">
         <li class="nav-item">
           <a class="nav-link" href="logout.php">
           <i class="fa fa-power-off"></i> Logout </a>
         </li>
       </ul>

       </div>
     </nav>
     <div class="vertical-menu">
       <h4>Menu</h4>

       <a href="categories.php" >Category</a>
       <a href="product.php">Add Product</a>
       <a href="#">Check Order</a>
       <a href="users.php">User Info</a>
        <a href="contact_us.php">Contact Us</a>

     </div>
 </body>
 </html>
