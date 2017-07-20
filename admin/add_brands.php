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
	$sql="SELECT * FROM `brand`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());
	
	$sql_min="SELECT MIN(id) from brand";
	$result_min=  mysqli_query($x,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min);

?>



<body>

	<!-- Header -->
	<?php include 'header.php' ?>
	<?php include 'add_new.php' ?>
	
	
	<!-- Page Content -->
	
<div class="container">
  
  <div class="row">
    <div class="col-md-6">
    <h1>Add Product Brand</h1>
    </div>
  </div>
  
    
<div class="row">
  
  <div class="col-md-6">
  <form method="POST">

   <div class="form-group">
   <label for="productprice" class="loginFormElement">Enter Product Brand</label>
   <input type="text" name="brand" class="form-control">
 </div>
 
    <button type="submit" name="BrandSubmit" class="btn btn-success loginFormElement">Add Brand</button>
	
    </div></form>
    
    </div>
  
    
  </div>
  
  <!-- /.container -->


<?php

	if(isset($_POST['BrandSubmit']))
	{
		$c = $_POST['brand'];
		
		$sql="insert into brand values('','$c')";
		
		mysqli_query($x,$sql);
		
		
		header('location:add_brands.php');

		
	}

?>
    
	<!-- All Categories -->
	
                  <form method="POST">
            
                    <table align="center"  >
                        <caption align='center' style='color:#2E4372'><h3><u>Brand Details</u></h3></caption>
						<th></th>
                        <th>Id-</th>
                        <th>-Name</th>
                       
						<?php
							while($rws=  mysqli_fetch_array($result))
							{
								echo "<tr><td><input type='radio' name='brand_id' value=".$rws[0];
								if($rws[0]==$rws_min[0]) echo' checked';
								echo " /></td>";
								
								echo "<td>".$rws[0]."</td>";
								echo "<td>".$rws[1]."</td>";

								echo "</tr>";
                            }
                        ?>
                    </table>
                    
                    
                    <table align="center" id='button'>
                    
                        <tr>
                            <td><input type="submit" name="delete" value="Delete Brand" class='btn btn-success loginFormElement' ></td>
                        </tr>
                        
                    </table>
                </form>
                
<?php

	if(isset($_POST['delete']))
	{
		$id = $_POST['brand_id'];
		
		$sql="DELETE FROM `brand` WHERE `id` = '$id'";
		
		mysqli_query($x,$sql);
		
		
		header('location:add_brands.php');

		
	}

?>

  
  
  </body>