<?php
	
	// admin login check
	

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Welcome - Online Shopping</title>


	<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/header.css" rel="stylesheet">
	
</head>

<?php

	include '../_inc/dbconn.php';
	$sql_c="SELECT * FROM `category`";
	$sql_b="SELECT * FROM `brand`";
	
	$cat=  mysqli_query($x,$sql_c) or die(mysqli_error());
	$brand=  mysqli_query($x,$sql_b) or die(mysqli_error());
	
	$row_c = array();
	while($row = mysqli_fetch_array($cat))
		$row_c[] = $row;
	$row_b = array();
	while($row = mysqli_fetch_array($brand))
		$row_b[] = $row;
?>


<body>

	<!-- Header -->
	<?php include 'header.php' ?>
	<?php include 'add_new.php' ?>
	
	
	<!-- Page Content -->
	
<div class="container">
  
  <div class="row">
    <div class="col-md-6">
    <h1>Add Product</h1>
    </div>
  </div>
  
    
  
<div class="row">
  
  <div class="col-md-6">
  <form method="POST" enctype="multipart/form-data">
    
	<div class="form-group">
   <label for="CatName" class="loginFormElement">Category:</label>
    <select class="form-control" name="catSelect">
		<?php foreach($row_c as $row): ?>
			<option value='<?= $row['id'] ?>'> <?= $row['name'] ?> </option>
		<?php endforeach; ?>
    </select>
	
	
	 </div>
	
	<div class="form-group">
   <label for="productname" class="loginFormElement">Brand:</label>
	<select class="form-control" name="brandSelect">
		<?php foreach($row_b as $row): ?>
			<option value='<?= $row['id'] ?>'> <?= $row['name'] ?> </option>
		<?php endforeach; ?>
    </select>
     </div>
	 
	 
 <div class="form-group">
   <label for="productname" class="loginFormElement">Title:</label>
   <input class="form-control" name="title" type="text" required/>
 </div>
   
 <div class="form-group">
      <label class="loginformelement" for="productdescription">Product Description</label>
  	  <textarea id="productdescription" class="form-control input-lg" placeholder="Large" type="text" name="description" required></textarea>
	  <div class="container">
      </div>
   
 <div class="form-group">
   <label for="productprice" class="loginFormElement">Product Price - Pkr</label>
   <input class="form-control" id="productprice" type="number" name="price" required/>
 </div>
   
   <div class="form-group">
   <label for="productprice" class="loginFormElement">Product Keywords</label>
   <input class="form-control" id="productprice" type="text" name="tags" required/>
 </div>
 
 <div class="form-group">
   <label for="productprice" class="loginFormElement">Product Quantity</label>
   <input class="form-control" id="productprice" type="number" name="qty" required/>
 </div>

<div class="form-group">
 
<label class="control-label">Product Image</label>
 
<input class="filestyle" data-icon="false" type="file" name="image" required/>
 
</div>
   
    <button type="submit" name="ProdSubmit" class="btn btn-success loginFormElement">Add Product</button>
  
    </div></form>
    
    </div>
  
    
  </div>
  
  <!-- /.container -->

  </body>
  
  
  
<?php
	
	if(isset($_POST['ProdSubmit']))
	{
		
		$cat	=	$_POST['catSelect'];
		$brand	=	$_POST['brandSelect'];
		$title	=	$_POST['title'];
		$desc	=	$_POST['description'];
		$price	=	$_POST['price'];
		$tags	=	$_POST['tags'];
		$qty	=	$_POST['qty'];
		
		$image	=	$_FILES['image']['name'];
		$image_temp = $_FILES['image']['tmp_name'];

		
		
		move_uploaded_file($image_temp,"../images/items/$image");
		
		
		$sql = " insert into item(cat_id, brand_id, title, description, price, image, tag, qty)
				 values('$cat','$brand','$title','$desc','$price','$image','$tags','$qty') ";
				 
				 
		
		$status = mysqli_query($x,$sql);
		
		if($status)
		{
			//echo "<script>alert('Insertion Sucessful')</script>";
			echo '<script> alert("Insertion Sucessful")</script>';
		}
		
		
		header('location:add_product.php');
		
	}
	
?>