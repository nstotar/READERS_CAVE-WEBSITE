<?php include "sidebar.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Readerscave Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/intro.css">
    <link rel="stylesheet" href="css/card.css">

</head>


<body>
    <div id="body" class="index">
        <!-- <h1> <?php echo basename($_SERVER['PHP_SELF']) ?> </h1> -->
        <?php include 'intro.php';
        ?>
        <h2>Top selling Books</h2>
        <div class="render">
            <?php include 'rendertable.php';
            ?>
        </div>
        <h2>featured selling Books</h2>
        <div class="render1">
            <?php include 'topselling.php';

            ?>
        </div>
        <br>
        <br>
        <br>
        <center>

            <div class="footer">
                <!-- Copyright ReadersCave | All rights reserved -->
                <p>copyright &copy;2022 <a href="#">ReadersCave</a> </p>
            </div>
        </center>
        <br>
        <br>
        <br>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script></script>
</body>

</html>