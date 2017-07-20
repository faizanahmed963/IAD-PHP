<?php
	
	// admin login check
	

?>


<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Welcome - Online Shopping</title>
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="../css/body-content.css" rel="stylesheet">
	<link href="../css/header.css" rel="stylesheet">
	
	
	
</head>

<?php

	include '../_inc/dbconn.php';
	$sql="SELECT * FROM `cart`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());
	
	$sql_min="SELECT MIN(id) from cart";
	$result_min=  mysqli_query($x,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min);

?>

<body>

	<!-- Header -->
	<?php include 'header.php' ?>
	
	
	<!-- Page Content -->
	
	
                  <form method="POST">
            
                    <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>All Orders</u></h3></caption>
						<th> </th>
                        <th>  Date   </th>	
                        <th>  User Name   </th>
                        <th>  Item Name   </th>
                        <th>  Quantity   </th>
                        <th>  Total Price   </th>
                        
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='order_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
							
							echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            
							
							$sqli = "select * from item where id = $rws[2]";
							$resi =  mysqli_query($x,$sqli) or die(mysqli_error());
							$i = mysqli_fetch_array($resi);
							echo "<td>".$i['title']."</td>";
							
							echo "<td>".$rws[3]."</td>";
                            
							$total = $rws[3]*$i['price'];
							echo "<td>".$total."</td>";
							
							
                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
                    <table align="center">
                        <tr>
                            <td>
                                <input type="submit" name="verify" value="Verify Order" class='btn btn-success loginFormElement'/>
                            </td>
                        </tr>
                    </table>
                </form>

				                
<?php

	if(isset($_POST['verify']))
	{
		$id = $_POST['order_id'];
		
		
		$sql1 = " select * from cart where id = $id ";
		$res = mysqli_query($x,$sql1) or die(mysqli_error());	
		$a = mysqli_fetch_array($res);
		
		$p = $a['item_id'];
		$sq = " select * from item where id = $p ";
		$rs =  mysqli_query($x,$sq) or die(mysqli_error());
		$it = mysqli_fetch_array($rs);
		//$i['title']
		
		
		$total = $a[3]*$it['price'];
							
		
		
		$date = $a['date'];
		$name = $it['title'];
		$qty  = $a['qty'];
		$prc  = $total;
		
		
		$sql2 = "insert into sales ( date, item_name, qty, sale_price )
				  values ( '$date', '$name', '$qty', '$prc' ) ";
		mysqli_query($x,$sql2);
		
		$sql3="DELETE FROM `cart` WHERE `id` = '$id'";
		mysqli_query($x,$sql3);
		
		
		header('location:orders.php');
	
	}
?>
	
	
</body>