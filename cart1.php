<?php error_reporting(0); ?>
<?php
session_start();
// session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login2.php');
} ?>
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
    <link rel="stylesheet" href="css/cart.css">
    <style>
        body {
            background-image: linear-gradient(135deg, #9708CC, #43CBFF, #9708CC, #43CBFF);
        }
    </style>
</head>

<body>

    <h1 class="title">Cart Items</h1>


    <section class="show-products">


        <div class="box-container">

            <?php
            include('config.php');
            include('sidebar.php');
            session_start();
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    $user = $fetch_products['user_name'];
                    if ($_SESSION['user_name'] == $user) { ?>

                        <div class="box">
                            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" height="280" width="250">
                            <!-- src="uploaded_img/<?php echo $row['img']; ?>" alt="blue" > -->
                            <div class="name"><?php echo $fetch_products['name']; ?></div>
                            <div class="price"><?php echo $fetch_products['price']; ?>/-</div>
                            <a href="orderform.php?update=<?php $_SESSION['bid'] = $fetch_products['book_id'];
                                                            echo $fetch_products['bid']; ?>" class="option-btn bg-info">buy now</a>
                            <a href="cart1.php?delete=<?php echo $fetch_products['bid']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">remove</a>
                        </div>
            <?php
                    }
                }



                if (isset($_GET['delete'])) {
                    $delete_id = $_GET['delete'];
                    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE bid = '$delete_id'") or die('query failed');
                    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
                    unlink('./uploaded_img/' . $fetch_delete_image['image']);
                    mysqli_query($conn, "DELETE FROM `products` WHERE bid = '$delete_id'") or die('query failed');
                    header('location:cart1.php');
                }
            }  ?>
        </div>
    </section>

    <!-- custom admin js file link  -->
    <script src="admin/js/admin_script.js"></script>

</body>

</html>