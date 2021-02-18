<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}

	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);

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
.box
{
  display:flex;
  flex-direction: row;
  justify-content:space-between;
}
.box p
{
  font-size:18px;

}
 a
{
  color: black;
}
.box p a:hover
{
  color:grey;
}

 </style>
 </head>
 <body>
   <div class="orders">
 <div class="col-lg-12">
   <div class="box">
     <h3>Product</h3>
      <p><a href="manage_product.php">Add Product</a></p>
   </div>
   <table class="table ">
   						 <thead>
   							<tr>
   							   <th>ID</th>
   							   <th>Categories</th>
   							   <th>Name</th>
   							   <th>Image</th>
   							   <th>MRP</th>
   							   <th>Price</th>
   							   <th>Qty</th>
                   <th>Status</th>
                   <th>Edit</th>
                   <th>Delete</th>
   							</tr>
   						 </thead>
   						 <tbody>
   							<?php
   							$i=1;
   							while($row=mysqli_fetch_assoc($res)){?>
   							<tr>
   							   <td><?php echo $row['id']?></td>
   							   <td><?php echo $row['categories']?></td>
   							   <td><?php echo $row['name']?></td>
   							   <td><img src="<?php echo $row['image']?>"/></td>
   							   <td><?php echo $row['mrp']?></td>
   							   <td><?php echo $row['price']?></td>
   							   <td><?php echo $row['qty']?></td>
   							   <td>
                     <?php
                     if($row['status'] == 1)
                     {
                      echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a>&nbsp;";
                     }
                     else
                     {
                         echo "<a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a>&nbsp;";
                     }
                      ?>
                    </td>
                    <td>
                      <?php  echo "<a href='manage_categories.php?id=".$row['id']."'>Edit</a>&nbsp;";?>
                    </td>
                    <td >
                      <?php  echo"<a href='?type=delete&id=".$row['id']."'>Delete</a>"; ?>
                    </td>
                   </tr>
                  <?php
                   } ?>
                  </tbody>
                </table>

 </div>
 </div>
 </body>
 </html>
