<?php

	include '../_inc/dbconn.php';
	$sql="SELECT * FROM `item`";
	$result=  mysqli_query($x,$sql) or die(mysqli_error());
	
	$sql_min="SELECT MIN(id) from item";
	$result_min=  mysqli_query($x,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min);

?>


    
	<!-- All Categories -->
	

                  <form method="POST">
            
                    <table align="center">
                        <caption align='center' style='color:#2E4372'><h3><u>All Items</u></h3></caption>
                        <th>id   </th>
                        <th>  Category   </th>
                        <th>  Brand   </th>
                        <th>  Title   </th>
                        <th>  Description   </th>	
                        <th>  Price   </th>
                        <th>  Keywords   </th>
                        <th>  Quantity   </th>
                        <th>  Image   </th>
						
                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='item_id' value=".$rws[0];
                            if($rws[0]==$rws_min[0]) echo' checked';
                            echo " /></td>";
							
							
							$sqlc = "select name from category where id = $rws[1]";
							$sqlb = "select name from brand where id = $rws[2]";
							
							$resc =  mysqli_query($x,$sqlc) or die(mysqli_error());
							$resb =  mysqli_query($x,$sqlb) or die(mysqli_error());
							
							$c = mysqli_fetch_array($resc);
							$b = mysqli_fetch_array($resb);
							
							
                            echo "<td>".$c['name']."</td>";
                            echo "<td>".$b['name']."</td>";
							
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[5]."</td>";
                            echo "<td>".$rws[7]."</td>";
                            echo "<td>".$rws[8]."</td>";

							$img = "../images/items/" . $rws[6];							
							echo "<td>"."<img src= '$img' width=50px height=50px alt='item image' />"."</td>";
                            //echo "<td>".$rws[6]."</td>";

                            echo "</tr>";
                        }
                        ?>
                        
                    </table>
                    <table align="center">
                        <tr>
                            <td>
                                <input type="submit" name="delete" value="Delete Item" class='btn btn-success loginFormElement'/>
                            </td>
                        </tr>
                    </table>
                </form>

				                
<?php

	if(isset($_POST['delete']))
	{
		$id = $_POST['item_id'];
		
		$sql="DELETE FROM `item` WHERE `id` = '$id'";
		
		mysqli_query($x,$sql);
		
		
		header('location:index.php');
	
	}
?>