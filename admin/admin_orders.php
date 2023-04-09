<?php

include 'config.php';

session_start();

$_SESSION['id'] = "admin_id";

if (isset($_SESSION['user_id'])) {
   header('location:login.php');
}

if (isset($_POST['update_order'])) {

   $order_update_id = $_POST['order_id'];
   $price = $_POST['price'];
   $update_payment = $_POST['update_payment'];
   // mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE order_id = '$order_update_id'") or die('query failed');
   mysqli_query($conn, "INSERT INTO `p_status`(`payid`,`price`,`oi`,`payment_status`) VALUES ('','$price','$order_update_id','$update_payment')") or die('query failed');
   $message[] = 'payment status has been updated!';
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE  order_id= '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="orders">

      <h1 class="title">placed orders</h1>

      <div class="box-container">
         <?php
         $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
         if (mysqli_num_rows($select_orders) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
         ?>
               <div class="box">
                  <p> order id : <span><?php echo $fetch_orders['order_id']; ?></span> </p>
                  <p> book id : <span><?php echo $fetch_orders['book_id']; ?></span> </p>
                  <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                  <p> number : <span><?php echo $fetch_orders['p_no']; ?></span> </p>
                  <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                  <p> address : <span><?php echo $fetch_orders['Address']; ?></span> </p>
                  <p> city: <span><?php echo $fetch_orders['city']; ?></span> </p>
                  <!-- <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p> -->
                  <!-- <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p> -->
                  <form action="" method="post">
                     <input type="hidden" name="order_id" value="<?php echo $fetch_orders['order_id']; ?>"><br>
                     <h2 style="border: 2px solid purple; color:antiquewhite;padding:.5rem; border-radius:15%;">
                        <input type="number" name="price" placeholder="paid amt">
                     </h2>

                     <select name="update_payment">
                        <option value="" selected disabled>payment status</option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                     </select>
                     <input type="submit" value="update" name="update_order" class="option-btn">
                     <a href="admin_orders.php?delete=<?php echo $fetch_orders['order_id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                  </form>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>
      </div>

   </section>










   <!-- custom admin js file link  -->
   <script src="js/admin_script.js"></script>

</body>

</html>