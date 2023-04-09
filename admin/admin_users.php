<?php

include 'config.php';

session_start();

$_SESSION['id'] = "admin_id";

if (!isset($_SESSION['id'])) {
   header('location:login.php');
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $sql = "DELETE FROM users1 WHERE `users1`.`users_id` = $delete_id";
   mysqli_query($conn, $sql) or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

   <?php include 'admin_header.php'; ?>

   <section class="users">

      <h1 class="title"> user accounts </h1>

      <div class="box-container">
         <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users1`") or die('query failed');
         while ($fetch_users = mysqli_fetch_assoc($select_users)) {
         ?>
            <div class="box">
               <p> user id : <span><?php echo $fetch_users['users_id']; ?></span> </p>
               <p> username : <span><?php echo $fetch_users['user_name']; ?></span> </p>
               <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
               <a href="admin_users.php?delete=<?php echo $fetch_users['users_id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">Remove user</a>
            </div>
         <?php
         };
         ?>
      </div>

   </section>









   <!-- custom admin js file link  -->
   <script src="js/admin_script.js"></script>

</body>

</html>