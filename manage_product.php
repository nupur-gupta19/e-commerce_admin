<?php
require('top.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
 $image_required='';
 $id=get_safe_value($con,$_GET['id']);
 $res=mysqli_query($con,"select * from product where id='$id'");
 $check=mysqli_num_rows($res);
 if($check>0){
   $row=mysqli_fetch_assoc($res);
   $categories_id=$row['categories_id'];
   $name=$row['name'];
   $mrp=$row['mrp'];
   $price=$row['price'];
   $qty=$row['qty'];
   $short_desc=$row['short_desc'];
   $description=$row['description'];
   $meta_title=$row['meta_title'];
   $meta_desc=$row['meta_desc'];
   $meta_keyword=$row['meta_keyword'];
 }else{
   header('location:product.php');
   die();
 }
}

if(isset($_POST['submit'])){
 $categories_id=get_safe_value($con,$_POST['categories_id']);
 $name=get_safe_value($con,$_POST['name']);
 $mrp=get_safe_value($con,$_POST['mrp']);
 $price=get_safe_value($con,$_POST['price']);
 $qty=get_safe_value($con,$_POST['qty']);
 $short_desc=get_safe_value($con,$_POST['short_desc']);
 $description=get_safe_value($con,$_POST['description']);
 $meta_title=get_safe_value($con,$_POST['meta_title']);
 $meta_desc=get_safe_value($con,$_POST['meta_desc']);
 $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

 $res=mysqli_query($con,"select * from product where name='$name'");
 $check=mysqli_num_rows($res);
 if($check>0){
   if(isset($_GET['id']) && $_GET['id']!=''){
     $getData=mysqli_fetch_assoc($res);
     if($id==$getData['id']){

     }else{
       $msg="Product already exist";
     }
   }else{
     $msg="Product already exist";
   }
 }

 if($msg==''){
   if(isset($_GET['id']) && $_GET['id']!='')
   {
       $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
        mysqli_query($con,$update_sql);
    }
   else
   {
     mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
   }
   header('location:product.php');
   die();
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
 .orders
 {
   margin-left:25%;
   margin-top: -360px;
  margin-right: 5%;

 }
</style>
</head>
<body>
  <div class="orders">
<div class="col-lg-12">
  <form method="post"  enctype="multipart/form-data">
   <fieldset>
    <legend><strong>Product Form:</strong></legend><br>
    <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="categories_id">
										<option>Select Category</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}

										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">MRP</label>
									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Qty</label>
									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_description?></textarea>
								</div>

								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>


							   <button  name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span>Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>


   </fieldset>
  </form>
</div>
</div>
</body>
</html>