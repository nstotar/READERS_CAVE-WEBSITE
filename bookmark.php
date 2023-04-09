<?php
error_reporting(0);
include("config.php");
?>
<!-- <?php include "sidebar.php" ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/bookmark.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="css/sell.css">
    <!-- <link rel="stylesheet" href="css/sell.css"> -->
    <style>
        .rslt {
            padding-left: 5REM;
            padding-right: 5rem;
            color: black;
            background-color: gray;
            border: 2px solid black;
            border-radius: 50%;
            float: right;
            display: flex;
        }

        body {
            background-image: linear-gradient(135deg, #9708CC, #43CBFF, #9708CC, #43CBFF);
            height: 100%;
        }
    </style>

</head>

<body>
    <main>
        <?php include 'sidebar.php'; ?>
        <center>
            <h1 style="color:black">Check the availability of books according to Genres</h1>
        </center>
        <center>
            <form action="" method="POST">
                <select name="department">
                    <option value="" selected="selected">-- select genres--</option>
                    <option value="Self development">Self development</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Horror">Horror</option>
                    <option value="study ">Study material</option>
                    <option value="compitative ">comics</option>
                    <option value="civil services">civil services</option>
                    <option value="sci-Fi">Sci-Fi</option>
                    <option value="Novel">novel</option>

                </select>

                <input type="submit" value="Submit" />
            </form>
        </center>
        </br>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data ">
            <table class="table table-striped table-primary ">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book pic</th>
                        <th>Book Name</th>
                        <th>Book Type</th>
                        <th>Description</th>
                        <th>Book Price</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php



                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $dep = $_POST['department'];
                        $query = "SELECT * FROM books WHERE book_publisher= '" . $dep . "'";
                        $run = mysqli_query($conn, $query);
                        $numrow = mysqli_num_rows($run);


                        while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo $row['book_id']; ?></td>
                                <td><img src="uploaded_img/<?php echo $row['book_img']; ?>" height="200" width="210">;</td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['book_publisher']; ?></td>
                                <td><?php echo $row['book_Description']; ?></td>
                                <td><?php echo $row['book_price']; ?></td>
                            </tr>

                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </main>
    ></a>
</body>

</html>