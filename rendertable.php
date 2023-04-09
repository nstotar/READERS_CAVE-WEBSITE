<?php include_once "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>render</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/card.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    $sql = "SELECT * FROM books";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="product-card">
                    <div class="logo-cart">
                        ReadersCave
                        <i class='bx bx-shopping-bag'></i>
                    </div>
                    <table>
                        <tr>
                            <div class="main-images">
                                <img id="blue" class="blue active" src="uploaded_img/<?php echo $row['book_img']; ?>" alt="blue" height="280" width="250">

                            </div>
                        </tr>
                        <tr>
                            <div class="book-details">
                                <span class="shoe_name"><b>
                                        <?php echo $row['book_name']; ?>
                                    </b></span>
                            </div>
                        </tr>
                        <tr>
                            <div class="book-price">
                                <div class="book-option">
                                    <span class="color">Price:</span>
                                    <?php echo '₹' . $row['book_price']; ?>
                                </div>
                        </tr>
                        <tr>
                            <div class="price">
                                <span class="price_letter">Book Description </span> <br>
                                <span class="price_num"> <?php echo  $row['book_Description']; ?></span>
                            </div>
                </div>
                </tr>
                <div class="button">
                    <div class="button-layer">
                        <a href=""><button>AVAILABLE</button></a>
                    </div>
                </div>
                </div>
                </table>
                </div>


    <?php }
        }
    } ?>

</body>

</html>