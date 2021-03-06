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

 session_start();
 
if($_SESSION['email']){
    $u=$_SESSION['email'];

    echo "Welcome $u";
}


?>
    <nav>
        <!--social-links-and-phone-number----------------->
        <div class="social-call">
            <!--social-links--->
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <!--phone-number------>
            <div class="phone">
                <span>Call: +000000000</span>
            </div>
        </div>
        <!--menu-bar----------------------------------------->
        <div class="navigation">
            <!--logo------------>
            <a href="index.php" class="logo"><img src="Images/icon.png">
            <span class="shop-name">Awazons</span></a>
            
           
            
            <!--menu----------------->
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li class="shop"><a href="#">Shop</a></li>
                <li><a href="#">Sale</a>
                    <!--label---->
                    <span class="sale-label">99% Off</span>
                </li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <!--right-menu----------->
            <div class="right-menu">
                <a href="javascript:void(0);" class="search">
                    <i class="fas fa-search"></i>
                </a>
                <a href="javascript:void(0);" class="user">
                    <i class="far fa-user"></i>
                </a>
                <a href="#">
                    <i class="fas fa-shopping-cart">
                        <span class="num-cart-product">0</span>
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <!--search-bar----------------------------------->
     <form  method="post">
         <div class="search-bar">
         
         <input class="search-btn" type="submit" name="searchbtn" value="Search" />
        <!--search-input------->
        <div class="search-input">
           
            <input type="text" placeholder="Search For Product" name="search" />
            
                
            <!--cancel-btn--->
            <a href="javascript:void(0);" class="search-cancel">
                <i class="fas fa-times"></i>
            </a>
            

        </div>

        <?php

                //K???t n???i theo Mysqli procedural
                $connect = mysqli_connect('localhost', 'root', '', 'mydb');
                
                if (isset($_POST['searchbtn'])) {
                    
                    $searchname = $_POST['search'];
                   
                    // Truy v???n t??? b???ng user c???t username = gi?? tr??? username nh???p t??? form v?? c???t password = gi?? tr??? password nh???p t??? form
                    $sql = "SELECT * FROM product where pname ='$searchname' ";
                    $result = mysqli_query($connect, $sql);
            //T??m v?? tr??? v??? k???t qu??? d?????i d???ng 1 m???ng v?? l???y t???ng d??ng d??? li???u


            while ($row = mysqli_fetch_array($result)) {


                //l???y ra t???ng d??ng d??? li???u truy v???n ???????c v?? hi???n th???
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
                    <a href="detail.php?id=<?php echo $row['pid'] ?>" class="p-name"><?php echo $row['pname'] ?> <img  src="<?php echo $row['pimg'] ?>"></a>
                    
                </div>
                <!--product-details-------->
                <div class="product-details">
                    <a href="detail.php?id=<?php echo $row['pid'] ?>" class="p-name"><?php echo $row['pname'] ?> </a>
                    <span class="p-price"><?php echo $row['pprice'] ?> </span>

                </div>

            </div><?php
            }
                    }
                        ?>


                
                </form>
    </div>
    <!---login-and-sign-up--------------------------------->
    <div class="form">

        <!--login---------->
        <div class="login-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Log In</strong>
            <!--inputs-->
            <form method="POST">
                <input type="email" name="email" placeholder="Example@gmail.com" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="login" value="Log In" />
                
                <?php

                //K???t n???i theo Mysqli procedural
                $connect = mysqli_connect('localhost', 'root', '', 'mydb');
              
                // N???u click v??o n??t login th?? m???i th???c hi???n 
                if (isset($_POST['login'])) {
                    
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if($email=="admin@gmail.com" && $password=="admin" )
                    {
                        echo "<script> alert('Move to Admin Page')</script>";

                        echo "<script> window.location.assign('AddProduct.php'); </script>";
                        exit;
                    }else
                    {
                    // Truy v???n t??? b???ng user c???t username = gi?? tr??? username nh???p t??? form v?? c???t password = gi?? tr??? password nh???p t??? form
                    $sql = "SELECT * FROM customer WHERE cemail ='$email' AND cpassword = '$password'";


                    // Th???c thi truy v???n
                    $result = mysqli_query($connect, $sql);
                    // Tr??? v??? k???t qu??? , ch??nh l?? c??c d??ng ???????c truy v???n
                    $row = mysqli_num_rows($result);
                    // N???u $row > 0 --> c?? tr??n 1 d??ng trong CSDL tr??ng v???i d??? li???u nh???p v??o form -> ????ng nh???p th??nh c??ng 
                    if ($row > 0) {
                        echo "<script> alert('Successful')</script>";
                        //session
                        $_SESSION['email']=$email;
                    } else {
                        echo "<script> alert('Failed')</script>";
                    }
                }
                }
                ?>
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="#" class="forget">Forget Your Password?</a>
                <a href="javascript:void(0);" class="sign-up-btn">Create Account</a>
            </div>
        </div>
        <!--Sign-up---------->
        <div class="sign-up-form">
            <!--cancel-btn---------------->
            <a href="javascript:void(0);" class="form-cancel">
                <i class="fas fa-times"></i>
            </a>
            <strong>Sign Up</strong>
            <!--inputs-->
            <form method="POST">
                <input type="text" name="fullname" placeholder="Full Name" required />
                <input type="email" name="email" placeholder="Example@gmail.com" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="submit" name="signup" value="Sign Up" />
                
                
                <?php

                //K???t n???i theo Mysqli procedural
                $connect = mysqli_connect('localhost', 'root', '', 'mydb');
              
                // N???u click v??o n??t login th?? m???i th???c hi???n 
                if (isset($_POST['signup'])) {
                    $xname= $_POST['fullname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    // Truy v???n t??? b???ng user c???t username = gi?? tr??? username nh???p t??? form v?? c???t password = gi?? tr??? password nh???p t??? form
                    $sql = "SELECT * FROM customer WHERE cemail ='$email' AND cpassword = '$password'";


                    // Th???c thi truy v???n
                    $result = mysqli_query($connect, $sql);
                    // Tr??? v??? k???t qu??? , ch??nh l?? c??c d??ng ???????c truy v???n
                    $row = mysqli_num_rows($result);
                    // N???u $row > 0 --> c?? tr??n 1 d??ng trong CSDL tr??ng v???i d??? li???u nh???p v??o form -> ????ng nh???p th??nh c??ng 
                    if ($row > 0) {
                        echo "<script> alert('email exist try again')</script>";
                        //session
                        
                        $_SESSION['email']=$email;
                    } else {
                        $sql ="INSERT INTO customer VALUES('$email','$password')";
                        $result =mysqli_query($connect,$sql);
                        if($result){
                      
                        echo "<script> alert('Welcome $xname')</script>";
                    }
                }
            }
                ?>
            </form>
            <!--forget-and-sign-up-btn-->
            <div class="form-btns">
                <a href="javascript:void(0);" class="already-account">
                    Already Have Account?</a>

            </div>
        </div>
    </div>

    <!--NEW ARRIVAL-------------------------------->
    <section class="new-arrival">

        <!--heading-------->
        <div>
    <span class="title">Who We Are</span>
    <div class="about-us-text" >Awazons is the global marketplace for unique and creative goods. It???s home to a universe of special, extraordinary items, from unique handcrafted pieces to vintage treasures.

        In a time of increasing automation, it???s our mission to keep human connection at the heart of commerce. That???s why we built a place where creativity lives and thrives because it???s powered by people. We help our community of sellers turn their ideas into successful businesses. Our platform connects them with millions of buyers looking for an alternative???something special with a human touch, for those moments in life that deserve imagination.
        
        As a company, we strive to lead with our guiding principles and to help spread ideas of sustainability and responsibility whose impact can reach far beyond our own business. </div>
</div>

    </section>


    <script src="js/JQuery.js"></script>
    <script>
    /*-----For Search Bar-----------------------------*/
    $(document).on('click', '.search', function() {
        $('.search-bar').addClass('search-bar-active')
    });

    $(document).on('click', '.search-cancel', function() {
        $('.search-bar').removeClass('search-bar-active')
    });
    /*---For Login and Sign-up----------------------------*/
    $(document).on('click', '.user,.already-account', function() {
        $('.form').addClass('login-active').removeClass('sign-up-active')
    });

    $(document).on('click', '.sign-up-btn', function() {
        $('.form').addClass('sign-up-active').removeClass('login-active')
    });

    $(document).on('click', '.form-cancel', function() {
        $('.form').removeClass('login-active').removeClass('sign-up-active')
    });
    
    </script>


</body>

</html>
