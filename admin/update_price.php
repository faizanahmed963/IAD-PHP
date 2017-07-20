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
	$sql="SELECT * FROM `item`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());
	
	$row_i = array();
	while($_row = mysqli_fetch_array($result))
		$row_i[] = $_row;
?>


<body>

	<!-- Header -->
	<?php include 'header.php' ?>
	<?php include 'update_manu.php' ?>
	
	
	<!-- Page Content -->
	
	<div class="container">
  
	  <div class="row">
		<div class="col-md-6">
		<h1>Update Price</h1>
		</div>
	  </div>
  
    
  
	<div class="row">
  
	  <div class="col-md-6">
		<form method="POST">
			<div class="form-group">
		    <label for="ItemName" class="loginFormElement"> Select Item:</label>
				<select class="form-control" name="itemSelect">
					<?php foreach($row_i as $row): ?>
						<option value='<?= $row['id'] ?>'> <?= $row['title'] ?> $<?= $row['price'] ?> </option>
					<?php endforeach; ?>
				</select>
			</div>			
			 <div class="form-group">
			   <label for="productname" class="loginFormElement">Enter Price to Update:</label>
			   <input class="form-control" name="newPrice" type="number" required/>
			 </div>
			 <button type="submit" name="Submit" class="btn btn-success loginFormElement">UPDATE</button>
	  </div>
		
  
    </div>
		</form>
    
    </div>
  
</body>


<?php

	if(isset($_POST['Submit']))
	{
		$id = $_POST['itemSelect'];
		

		$q = " select price from item where id = '$id' ";
	
		$res = mysqli_query($x,$q) or die(mysqli_error());
	
		$a = mysqli_fetch_array($res);
	
		$price = $_POST['newPrice'];
		
		
		$sql_q = " UPDATE item SET price = '$price' WHERE id = '$id' ";
		
		$status = mysqli_query($x,$sql_q);
		
		
		if($status)
		{
			$str = "Old Price: " .$a['price']. ". New Price: " .$price;
			echo '<script> alert("'.$str.'")</script>';
		}
	}

?>