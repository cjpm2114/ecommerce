<?php
function getBrand(){
	$con=mysqli_connect('localhost','root','','ecommerce');
	$get_brands="SELECT * from brands";
	$run_brands=mysqli_query($con,$get_brands);
	while($row_brand=mysqli_fetch_array($run_brands)){
	
		$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];

		echo "<li><a href='index.php?Product_brand=$brand_id'>$brand_title</a></li>";
	}
}

function getCategory(){
	$con=mysqli_connect('localhost','root','','ecommerce');
	$get_cat="SELECT * from category";
	$run_cat=mysqli_query($con,$get_cat);
	while($row_cat=mysqli_fetch_array($run_cat)){
	
		$cat_id=$row_cat['cat_id'];
		$cat_title=$row_cat['cat_title'];

		echo "<li><a href='index.php?Product_cat=$cat_id'>$cat_title</a></li>";
	}
}

function getPro(){
	if(!isset($_GET['Product_cat'])){
		if(!isset($_GET['Product_brand'])){

		$con=mysqli_connect("localhost","root","","ecommerce");
		$get_pro="SELECT * from product order by RAND() LIMIT 0,1";
		$run_pro=mysqli_query($con, $get_pro);
		
		while($row_pro=mysqli_fetch_array($run_pro)){

			$pro_id=$row_pro['Product_id'];
			$pro_cat=$row_pro['Product_cat'];
			$pro_brand=$row_pro['Product_brand'];
			$pro_title=$row_pro['Product_title'];
			$pro_price=$row_pro['Product_price'];
			$pro_image=$row_pro['Product_image'];

			echo "	<div id='single_product'>
						<h3>$pro_title</h3>
						<br>
						<img src='admin_area/product_images/$pro_image' width='180' height='180'>
						<br>
						<p><b>$ $pro_price</b></p>
						<a href='#' style='align: center;'>Details</a> 
						<br>
						<a href='#'><button style='float:right; right: 45px;'>Add to Cart</button></a>
					</div>";
			}
		}
	}
}
function getCatPro(){

	if(isset($_GET['Product_cat'])){
		$cat_id=$_GET['Product_cat'];

		$con=mysqli_connect("localhost","root","","ecommerce");
		$get_cat_pro="SELECT * from product where Product_cat='$cat_id' ";
		$run_cat_pro=mysqli_query($con, $get_cat_pro);
		$count_cat=mysqli_num_rows($run_cat_pro);
		if($count_cat==0){
			echo "<h2 style='padding:20px;'>There is no product in this category!</h2>";
		}

		while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

			$pro_id=$row_cat_pro['Product_id'];
			$pro_cat=$row_cat_pro['Product_cat'];
			$pro_brand=$row_cat_pro['Product_brand'];
			$pro_title=$row_cat_pro['Product_title'];
			$pro_price=$row_cat_pro['Product_price'];
			$pro_image=$row_cat_pro['Product_image'];

			echo"<div id='single_product'>
					<h3>$pro_title</h3>
					<br>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
					<br>
					<p><b> $ $pro_price</b></p>
					<br>
					<a href='details.php' style='align:center;'>Details</a>
					<br>
					<a href='index.php'><button style='float:right; right: 45px;'>Add to Cart</b>
				</div>";

		}
	}
}

function getBrandPro(){
	if(isset($_GET['Product_brand'])){
		$brand_id=$_GET['Product_brand'];

		$con=mysqli_connect("localhost","root","","ecommerce");
		$get_brand_pro="SELECT * from product where Product_brand='$brand_id'";
		$run_brand_pro=mysqli_query($con, $get_brand_pro);
		$count_brand=mysqli_num_rows($run_brand_pro);
		if($count_brand==0){
			echo "<h2 style='padding:20px;'>There is no product in this Brand!</h2>";
		}

		while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){

			$pro_id=$row_brand_pro['Product_id'];
			$pro_cat=$row_brand_pro ['Product_cat'];
			$pro_brand=$row_brand_pro ['Product_brand'];
			$pro_title=$row_brand_pro ['Product_title'];
			$pro_price=$row_brand_pro ['Product_price'];
			$pro_image=$row_brand_pro ['Product_image'];

			echo"<div id='single_product'>
					<h3>$pro_title</h3>
					<br>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
					<br>
					<p><b> $ $pro_price</b></p>
					<br>
					<a href='details.php' style='align:center;'>Details</a>
					<br>
					<a href='index.php'><button style='float:right; right: 45px;'>Add to Cart</b>
				</div>";

		}
	}
}
?>