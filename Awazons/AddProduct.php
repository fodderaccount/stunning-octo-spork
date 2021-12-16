<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, intial-scale=1.0" name="viewport">
    <title>Awazons</title>
    <!--fav-icon---------------->
    <link rel="shortcut icon" href="Images/icon.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--style----->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: poppins;
    }
    </style>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</head>

<body>
    <?php 
    echo 'Welcome Admin';
    ?>
<nav>
        <!--social-links-and-phone-number----------------->

        <!--menu-bar----------------------------------------->
        <div class="navigation">
            <!--logo------------>
            <a href="index.php" class="logo"><img src="Images/icon.png"><span class="shop-name">Awazons</span></a>
            
            <!--menu-icon------------->
            
            <!--menu----------------->
            <ul class="menu">
                <li><a href="index.php">Home Page</a></li>
                <li class="shop"><a href="AddProduct.php">Add Product</a></li>
                <li><a href="UpdateProduct.php">Update Product</a>
                    
                </li>
                <li><a href="DeleteProduct.php">Delete Product</a></li>
                
            <!--right-menu----------->
            
        </div>
    </nav>

    <form method="POST" enctype="multipart/form-data">
	<table class="product-container">
		<tr> 
			<td> Product ID</td>
			<td><input type="text" name="product_id"> </td>
		</tr>
		<tr> 
			<td> Product Name</td>
			<td><input type="text" name="product_name"> </td>
		</tr>
		<tr> 
			<td> Product Price</td>
			<td><input type="text" name="product_price"> </td>
		</tr>
		<tr> 
			<td> Product Img</td>
			<td><input type="file" name="product_img"> </td>

		</tr>
		<tr> 
			<td> Product Details</td>
			<td><input type="text" name="product_detail"> </td>
		</tr>
		<tr> 
			<td> </td>
			<td><input type="submit" name="add_product" value="Add"> </td>
		</tr>
	</table>
	
</form>
<?php 
$connect = mysqli_connect('localhost','root','','mydb');
				if(!$connect){
					echo "Connection Failed";
				}

				if(isset($_POST['add_product'])){
					$product_id = $_POST['product_id'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$product_detail = $_POST['product_detail'];

					//Lấy ảnh từ thư mục bất kỳ của máy tính
					$product_img = $_FILES['product_img']['name'];
					// di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdoc
					$product_img_tmp = $_FILES['product_img']['tmp_name'];

					// Đưa ảnh từ thư mục tmp sang thư mục cần lưu 
					move_uploaded_file($product_img_tmp, "Images/$product_img");

					//Thêm sản phẩm vào cơ sở dữ liệu
					$sql = "INSERT INTO product VALUES ('$product_id','$product_name','Images/$product_img','$product_detail','$product_price')";
					$result = mysqli_query($connect,$sql);
					if($result){
						echo"<script>alert('New product added') </script>";
						echo"<script> window.open('AddProduct.php','_self') </script>";
					}
					else{
						echo"<script>alert('Error please try again') </script>";
					}
				}
?>
</body>
</html>