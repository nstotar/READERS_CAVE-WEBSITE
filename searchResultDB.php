<?php include "config.php"; ?>
<?php include "sidebar.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/searchResultDB.css">
    <title>Document</title>
</head>

<body>
    <section class="search_items">
        <?php
        $name = $_GET['page'];
        $sql = "SELECT * FROM books where (book_name Like '%$name%') OR (book_Description Like '%$name%') OR (book_publisher Like '%$name%')";
        $result = mysqli_query($conn, $sql);
        // if (!$result) {
        // echo "con failed";
        // } elseif (isset($name)) {
        if (mysqli_num_rows($result) > 0) {

            if ($result != $name) {
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
                                <div class="shoe-details">
                                    <span class="shoe_name"><b>
                                            <?php echo $row['book_name']; ?>
                                        </b></span>
                                </div>
                            </tr>
                            <tr>
                                <div class="color-price">
                                    <div class="color-option">
                                        <span class="color">Price:</span>
                                        <div class="circles">
                                            <?php echo '₹' . $row['book_price']; ?>
                                        </div>
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
                            <a href="orderform.php"><button>Buy Now</button></a>
                        </div>
                    </div>
                    </table>
                    </div>


            <?php }
            }
        } else { ?>
            <div class="text">
                <h1>SORRY NO RESULT FOUND</h1>

                <span>
                    <h3>search again..</h3>
                </span>
            </div>
        <?php }
        ?>
    </section>
</body>

</html>