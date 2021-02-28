<?php
require('connection.php');
require('function.php');
$msg='';
if (isset($_POST['submit'])) {
  $username=get_safe_value($con,$_POST['username']);
  $password=get_safe_value($con,$_POST['password']);
  $sql="select * from admin_user where username='$username' and password='$password'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {
   $_SESSION['ADMIN_LOGIN']='yes';
   $_SESSION['ADMIN_USERNAME']='$username';
   header('location:categories.php');
   die();
  }
  else
  {
  $msg="Please enter correct details";
  }
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
  body
  {
  background-image:url("bg.png");
  background-repeat: no-repeat;
   background-size: cover;
  }
  .field_error
  {
    color: red;
    margin-top: 15px;
  }
 .container
 {
   margin-top:10%;
   margin-left:44%;
 }
 form
 {
   display: block;
   border-radius:5%;
   padding: 15px 15px 15px 15px;
   background-color:#a3d2ca;
   width:50%;
 }
 button
 {
   margin-top: 2%;
   margin-left: 40%;
 }
 .login
 {
   margin-bottom: 2%;
   margin-left: 40%;
 }

  </style>
</head>
<body>
<div class="container">
  <div class="login-content">
<form method="post">
  <div class="login">
    <h4>Sign-In</h4>
  </div>
<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <button type="submit"name="submit" class="btn btn-success btn-flat">Sign-In</button>

</form>
<div class="field_error">
<?php echo $msg ?>
</div>
</div>
</div>

</body>
</html>
