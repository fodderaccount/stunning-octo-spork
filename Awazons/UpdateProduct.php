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
			<td> Product Detail</td>
			<td><input type="text" name="product_detail"> </td>
		</tr>
		<tr> 
			<td> Product Img</td>
			<td><input type="file" name="product_img"> </td>
		</tr>
		<tr> 
			<td> </td>
			<td><input type="submit" name="update_product" value="Update"> </td>
		</tr>
	</table>
    </form>
    <?php 
                $connect = mysqli_connect('localhost','root','','mydb');
				if(!$connect){
					echo "Connection failed";
				}

				if(isset($_POST['update_product'])){
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

					//Check
                    $sql ="SELECT pid FROM product";
                    $result = mysqli_query($connect,$sql);
                    if(!$result){
                        echo"<script>alert('Product Doesn't Exist') </script>";
                    }else{
					$sql = "UPDATE product SET pname='$product_name',pdetail='$product_detail',pprice='$product_price',pimg='Images/$product_img' where pid='$product_id'";
					$result = mysqli_query($connect,$sql);
					if($result){
						echo"<script>alert('Product Updated') </script>";
						echo"<script> window.open('UpdateProduct.php','_self') </script>";
					}
					else{
						echo"<script>alert('Error please try again') </script>";
					}
                }
            }
				
?>
<section class="new-arrival">



<!--products----------------------->
<div class="product-container">
	<?php
	$connect = mysqli_connect('localhost', 'root', '', 'mydb');
	if (!$connect) {
		echo "Failed";
	}
	$sql = "SELECT * FROM product";


	$result = mysqli_query($connect, $sql);
	//Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu


	while ($row = mysqli_fetch_array($result)) {


		//lấy ra từng dòng dữ liệu truy vấn được và hiển thị
		//$row['product_id'];
		//$row['product_name'];
		//$row['product_img'];
		//$row['product_price'];

	?>
	<!--product-box-1---------->
	<div class="product-box">
		<!--product-img------------>
		<div class="product-img">
			<!--add-cart---->
			<a class="add-cart">
				<i class="fas fa-shopping-cart"></i>
			</a>
			<!--img------>
			<a href="detail.php?id=<?php echo $row['pid'] ?>"><img  src="<?php echo $row['pimg'] ?>"></a>
		</div>
		<!--product-details-------->
		<div class="product-details">
			<a href="detail.php?id=<?php echo $row['pid'] ?>" class="p-name">ID:<?php echo $row['pid'] ?> </a>
			

		</div>

	</div><?php
			}
				?>

</section>


    
    



</body>
</html>