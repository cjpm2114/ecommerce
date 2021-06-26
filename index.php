<?php
	$connect=mysqli_connect("localhost","root","","ecommerce");
?>

<?php include_once("functions/functions.php") ?>

<!DOCTYPE>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" href="styles/styles.css" media="all">
	</head>
<body>
	<div class="main_wrapper">
			<!-- Menubar -->
			<div id="menubar">
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Products</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div id="form">
					<form method="get" action="result.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product">
						<button type="submit" name="search">Search</button>
					</form>
				</div>
			</div>
			<!-- Header -->
		<div class="header_wrapper">
			<img id="logo" src="images/logo1.jpg" width="200px" height="100px">
			<img id="banner" src="images/nightlife.jfif" width="800px" height="100px">
		</div>
		<!-- Sidebar -->
		<div id="sidebar">
			<h3 style="color: white;">Brands</h3>
				<?php getBrand(); ?>
			<h3 style="color: white;">Category</h3>
				<?php getCategory(); ?>	
		</div>
		<div class="content_wrapper">
			<!-- Content Area -->
			<div id="content_area">
				<div id="product_box">
					<?php getPro();?>
					<?php getCatPro();?>
					<?php getBrandPro();?>
				</div>
			</div>
			<!-- Footer -->
			<div id="footer">
				<h2 style="text-align:center;padding-top:40px;">&copy; 2016 by The Webmaster.</h2>
			</div>
		</div>
	</div>
</body>
</html>