<?php
session_start();
// session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login2.php');
}
$un = $_SESSION['user_name'];
// <!-- <?php error_reporting(0)> -->
echo $un;
// echo $fetch_products['book_id'];
$bookId = $_GET['delete'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="admin/css/admin_style.css">

</head>

<body>

    <h1 class="title"> products in your cart</h1>


    <section class="show-products">

        <div class="box-container">

            <?php
            include('config.php');
            // session_start();
            $select_products = mysqli_query($conn, "SELECT * FROM books where book_id= '$bookId'") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    $cbookimg = $fetch_products['book_img'];
                    $cbookprice = $fetch_products['book_price'];
                    $cbookname = $fetch_products['book_name'];
                    $cid = $fetch_products['book_id'];
                    // if ($cid != $bookId) {


                    $insert_products = mysqli_query($conn, "INSERT INTO `products`(`id`,`bid`,`user_name`, `name`, `image`, `price`)
                     VALUES ('','$bookId','$un','$cbookname','$cbookimg',' $cbookprice')") or die('query failed');
                    header('location:cart1.php');
                }
            }
            ?>

        </div>
    </section>

    <!-- custom admin js file link  -->
    <script src="admin/js/admin_script.js"></script>

</body>

</html>