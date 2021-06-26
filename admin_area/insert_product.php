<!DOCTYPE>
<?php
	include("includes/db.php");
?>
<html>
<head>
	<title>Inserting Product</title>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
	Tinymce.init({selector:'textarea'});
</script>
</head>
<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750" border="2" bgcolor="orange">
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			<tr>
				<td align="right"><b> Product Title: </b> </td>
				<td><input type="text" name="Product_title" size="60" required/></td>
			</tr>
			<tr>
				<td align="right"> <b>Product Category: </b> </td>
				<td>
					<select name="Product_cat" value='$cat_id'>
					<option> Select a Category</option>
					<?php
						$get_cats="select * from category";
						$run_cats=mysqli_query($con, $get_cats);

						while ($row_cats=mysqli_fetch_array($run_cats)) {
							$cat_id=$row_cats['cat_id'];
							$cat_title=$row_cats['cat_title'];

							echo "<option value='$cat_id'>$cat_title</option>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td align="right"><b> Product Brand: </b></td>
				<td>
					<select name="Product_brand" value='$brand_id'>
					<option> Select a Brands</option>
					<?php
						$get_brand="select * from brands";
						$run_brand=mysqli_query($con, $get_brand);
						while ($row_brand=mysqli_fetch_array($run_brand)) {
							$brand_id=$row_brand['brand_id'];
							$brand_title=$row_brand['brand_title'];

							echo "<option value='$brand_id'>$brand_title</option>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td align="right"> <b>Product Image: </b> </td>
				<td><input type="file" name="Product_image" /></td>
			</tr>
			<tr>
				<td align="right"> <b>Product Price: </b> </td>
				<td><input type="text" name="Product_price" /></td>
			</tr>
			<tr>
				<td align="right"><b> Product Description: </b></td>
				<td><input type="text" name="Product_desc" /></td>
			</tr>
			<tr>
				<td align="right"><b> Product Keyword: </b></td>
				<td><input type="text" name="Product_keywords" size="50" /></td>
			</tr>
				<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Now" /></td>
			</tr>
		</table>

</body>
</html>

<?php

	if(isset($_POST['insert_post'])){
	//getting the text data from the fields
		$product_title=$_POST['Product_title'];
		$product_cat=$_POST['Product_cat'];
		$product_brand=$_POST['Product_brand'];
		$product_price=$_POST['Product_price'];
		$product_desc=$_POST['Product_desc'];
		$product_keywords=$_POST['Product_keywords'];

		//getting the image from the field

		$product_image=$_FILES['Product_image']['name'];
		$product_image_tmp=$_FILES['Product_image']['tmp_name'];

		//to move the image into the product_images folder

		move_uploaded_file($product_image_tmp, "product_images/$product_image");

		//To push the data to the database

			$insert_product="insert into product (Product_title, Product_cat, Product_brand, Product_price, Product_desc, Product_image, Product_keywords) values ('$product_title','$product_cat','$product_brand','$product_price','$product_desc','$product_image','$product_keywords');";

			$insert_pro= mysqli_query($con, $insert_product);

		//condition to alert admin if the process is successful 

		if($insert_pro){

			echo"<script>alert('Product has been inserted!')</script>";
			echo"<script>windows.open(../admin_area/insert_product.php)</script>";
		}
		else{

		}
	}
?>