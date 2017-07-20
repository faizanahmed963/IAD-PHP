<?php

	include '_inc/dbconn.php';
	
	
	// Categories
	
	$sql_c="SELECT * FROM `category`";
	
	$res_c=  mysqli_query($x,$sql_c) or die(mysqli_error());

	$cat = array();
	while($row = mysqli_fetch_array($res_c))
		$cat[] = $row;



	// Brands
	
	$sql_b="SELECT * FROM `brand`";
	
	$res_b=  mysqli_query($x,$sql_b) or die(mysqli_error());

	$brand = array();
	while($rows = mysqli_fetch_array($res_b))
		$brand[] = $rows;


	
	// Items
	
	$sql_i = "SELECT * FROM `item`";
	
	$res_i =  mysqli_query($x,$sql_i) or die(mysqli_error());

	$item = array();
	while($rws = mysqli_fetch_array($res_i))
		$item[] = $rws;
?>



<!--  Body Start  -->

<div class="body-border">
	<div class="container">

        <div class="row">
            <div class="col-md-3">
			
			
					<!--  Categories sidebar  -->
					
                <p class="lead">By Category</p>
                <div class="list-group">
					<!--
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
					-->
					
					<?php foreach($cat as $c): ?>
						<a href="#" class="list-group-item"> <?= $c['name'] ?> </a>
					<?php endforeach; ?>
					
                </div>
				
				
				
					<!--  Brands sidebar  -->
                <p class="lead">By Brands</p>
                <div class="list-group">
					<!--
                    <a href="#" class="list-group-item">Brand 1</a>
                    <a href="#" class="list-group-item">Brand 2</a>
                    <a href="#" class="list-group-item">Brand 3</a>
					-->
					
					<?php foreach($brand as $b): ?>
						<a href="#" class="list-group-item"> <?= $b['name'] ?> </a>
					<?php endforeach; ?>
					
                </div>
			</div>



					<!--  Slides  -->
			<div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
								<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								<li data-target="#carousel-example-generic" data-slide-to="4"></li>
								
                            </ol>
									<!--  750 x 300  -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/banners/1.gif" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

				
				
					<!--  Items  -->
                <div class="row">
								<!--  320 x 150  -->
				
					<?php foreach($item as $i): ?>
				
					  <form method="POST" >
				
						<div class="col-sm-4 col-lg-4 col-md-4">
						
							<div class="thumbnail" style="overflow: auto; height:auto;">
							
								<?php $img = "images/items/" . $i['image']; ?>
								<img src='<?= $img ?>' width='320' height='150' alt="">
								
								<div class="caption" style="overflow: auto; height:auto;">
								
									<h4 class="pull-right">$ <?= $i['price']?></h4>
									
									<h4><a href="#"><?= $i['title']?></a></h4>
									
									<p><?= $i['description']?></p>
									
									<?php
										$sqlc = "select name from category where id = $i[1]";
										$sqlb = "select name from brand where id = $i[2]";
										
										$resc =  mysqli_query($x,$sqlc) or die(mysqli_error());
										$resb =  mysqli_query($x,$sqlb) or die(mysqli_error());
										
										$c = mysqli_fetch_array($resc);
										$b = mysqli_fetch_array($resb);
									?>
									
									<hr>
									<p class="pull-right"> Qty - <?= $i['qty'] ?></p>							
									<p>Category - <?=$c['name']?><p>
									<p>Brand - <?=$b['name']?><p>
									
									<hr>
									<label class="loginFormElement">Enter Product Quantity</label>
									<input type="number" name="buy_qty" class="form-control">
									<input type="hidden" name="id" value='<?= $i['id'] ?>' class="form-control">
									<button type="submit" name="Submit" class="btn btn-success loginFormElement">Add to cart</button>
									
								</div>
								<div class="ratings">
									<p class="pull-right">reviews</p>
									<p>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									</p>
								</div>
							</div>
						</div>
					  </form>
					<?php endforeach; ?>
				
					
					<!-- HTML
					
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$94.99</h4>
                                <h4><a href="#">Fifth Product</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
					
					-->



                </div>

            </div>

		</div>

    </div> 
	</div>
	
  
<?php

	if(isset($_POST['Submit']))
	{
		$id = $_POST['id'];
		$qty_buy = $_POST['buy_qty'];
		
		$sql1 = " select * from item where id = '$id' ";		
		$res = mysqli_query($x,$sql1) or die(mysqli_error());	
		$a = mysqli_fetch_array($res);
		
		$qty_old = $a['qty'];
		
		if( $qty_old >= $qty_buy )
		{
			// if logined
			// get user name
			// else get ip
			
			$ip = $_SERVER['REMOTE_ADDR'];			
			if(!empty($_SERVER['HTTP_CLIENT_IP']))
			{	$ip = $_SERVER['HTTP_CLIENT_IP'];			}
			else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];			}
			
			
			
			
			$user 		= $ip;
			$item_id 	= $id;
			$quantity	= $qty_buy;
			//$date  		= date('d/m/Y h:i:s a', time());
			$date = date('m/d/Y h:i:s a', time());
			
			$sql2 = "insert into cart( user_name, item_id, qty, date ) 
					values( '$user', '$item_id', '$quantity', '$date' )";
					
			$status = mysqli_query($x,$sql2);
		
			if($status)
			{
				$qty_new = $qty_old - $qty_buy; 
				
				$sql3 = " UPDATE item SET qty = '$qty_new' WHERE id = '$id' ";
		
				$status = mysqli_query($x,$sql3);
				
				$str = "Oreder Recieved!";
				echo '<script> alert("'.$str.'")</script>';
			}
			else
			{
				$str = "Something went wrong!";
				echo '<script> alert("'.$str.'")</script>';
			}
		}
		else
		{
			$str = "Cannot buy more than stock.";
			echo '<script> alert("'.$str.'")</script>';
		}
		
		//header('location:index.php');
	}
?>