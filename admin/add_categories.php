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
	$sql="SELECT * FROM `category`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());
	
	$sql_min="SELECT MIN(id) from category";
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
				<h1>Add Product Category</h1>
			</div>
		</div>
  
    
		<div class="row">
  
			<div class="col-md-6">

				<form method="POST">

				   <div class="form-group">
					   <label class="loginFormElement">Enter Product Category</label>
					   <input type="text" name="cat" class="form-control">
					   
					</div>
 
					<button type="submit" name="CatSubmit" class="btn btn-success loginFormElement">Add Category</button>
  
				</form>
	
			</div>
    </div>
  
    
  </div>
  
  <!-- /.container -->

  
<?php

	if(isset($_POST['CatSubmit']))
	{
		$c = $_POST['cat'];
		
		$sql="insert into category values('','$c')";
		
		mysqli_query($x,$sql);
		
		
		header('location:add_categories.php');

		
	}

?>
    
	<!-- All Categories -->
	
                  <form method="POST">
            
                    <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>Category Details</u></h3></caption>
                        <th>Id-</th>
                        <th>-Name</th>
                       
						<?php
							while($rws=  mysqli_fetch_array($result))
							{
								echo "<tr><td><input type='radio' name='cat_id' value=".$rws[0];
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
                            <td><input type="submit" name="delete" value="Delete Category" class='btn btn-success loginFormElement' ></td>
                        </tr>
                        
                    </table>
                </form>
                
<?php

	if(isset($_POST['delete']))
	{
		$id = $_POST['cat_id'];
		
		$sql="DELETE FROM `category` WHERE `id` = '$id'";
		
		mysqli_query($x,$sql);
		
		
		header('location:add_categories.php');

		
	}

?>
  
  </body>