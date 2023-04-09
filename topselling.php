<?php error_reporting(0); ?>
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

  <h1 class="title">Sellers products</h1>


  <section class="show-products">

    <div class="box-container">

      <?php
      include('config.php');
      session_start();
      $select_products = mysqli_query($conn, "SELECT * FROM `books`") or die('query failed');
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      ?>
          <div class="box">
            <img src="uploaded_img/<?php echo $fetch_products['book_img']; ?>" height="280" width="250">
            <!-- src="uploaded_img/<?php echo $row['book_img']; ?>" alt="blue" > -->
            <div class="name"><?php echo $fetch_products['book_name']; ?></div>
            <div class="price"><?php echo $fetch_products['book_price']; ?>/-</div>
            <a href="orderform.php?update=<?php $_SESSION['book_id'] = $fetch_products['book_id'];
                                          echo $fetch_products['book_id']; ?>" class="option-btn bg-info">buy now</a>
            <a href="cart.php?delete=<?php echo $fetch_products['book_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure');">Cart</a>
          </div>
      <?php
        }
      }
      ?>
    </div>

  </section>

  <!-- custom admin js file link  -->
  <script src="admin/js/admin_script.js"></script>

</body>

</html>