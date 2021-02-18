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
  .field_error
  {
    color: red;
    margin-top: 15px;
  }


  </style>
</head>
<body>
<div class="container">
  <div class="login-content">
<form method="post">
<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <button type="submit"name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
</form>
<div class="field_error">
<?php echo $msg ?>
</div>
</div>
</div>

</body>
</html>
