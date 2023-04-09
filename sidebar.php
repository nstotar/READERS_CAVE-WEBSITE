<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar1.css">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="container">
        <ul class="side-bar-ul">
            <li class="li-item ">
                <a href="home.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "home.php") ?
                                                "each-item active" : "each-item " ?> ">
                    <i class="bx bx-home icon"></i>
                    <span class="icon-text">Home</span>
                </a>
            </li>

            <li class="li-item  ">
                <a href="Search.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "Search.php") ?
                                                    "each-item active" : "each-item" ?> ">
                    <i class="bx bx-search icon"></i>
                    <span class="icon-text">Search</span>
                </a>
            </li>

            <li class="li-item ">
                <a href="cart1.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "cart1.php") ?
                                                "each-item active" : "each-item" ?> ">
                    <i class="bx bx-cart icon"></i>
                    <span class="icon-text">cart</span>
                </a>
            </li>

            <li class="li-item ">
                <a href="bookmark.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "bookmark.php") ?
                                                    "each-item active" : "each-item" ?> ">
                    <i class="bx bx-bookmark icon"></i>
                    <span class="icon-text">Genre</span>
                </a>
            </li>
            <li class="li-item ">
                <a href="sell.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "sell.php") ?
                                                "each-item active" : "each-item" ?> ">
                    <i class="bx bx-box icon"></i>
                    <span class="icon-text">Sell Here</span>
                </a>
            </li>


            <li class="dark">
                <a href="#" class="each-item">
                    <a href="logout.php" class=" <?php echo (basename($_SERVER['PHP_SELF']) == "logout.php") ?
                                                        "each-item active" : "each-item" ?> ">
                        <i class="bx bx-exit icon"></i>
                        <span class="icon-text">Logout</span>
                    </a>
            </li>

        </ul>
    </div>




    <script src="js/app.js"></script>

</body>

</html>