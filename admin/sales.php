<?php
	
	// admin login check
	

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Welcome - Online Shopping</title>
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="../css/body-content.css" rel="stylesheet">
	<link href="../css/header.css" rel="stylesheet">
	
	
	
</head>


<body>

	<!-- Header -->
	<?php include 'header.php' ?>
	
	
	<!-- Page Content -->


<?php

	include '../_inc/dbconn.php';
	$sql="SELECT * FROM `sales`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());

?>
	
	
		<!-- Sales -->

			<?php $total = 0; ?>
		        <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>All Sales</u></h3></caption>
						
                        <th>Id   </th>
                        <th>  Date   </th>
                        <th>  Item Name   </th>
                        <th>  Quantity   </th>
                        <th>  Sale   </th>
						
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr>";
							
                            echo "<td>".$rws[0]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[4]."</td>";
							
							echo "</tr>";
							
							$total = $total + $rws[4];
                        }
						
						
						echo "<tr>";
							echo "<td>"."Total Sales: "."</td>";
							echo "<td>".$total."</td>";
						echo "</tr>";
                        ?>
						
                        
                    </table>

	
</body>