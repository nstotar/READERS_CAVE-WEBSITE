<?php
include("../php/db.php");
include("../php/config.php");
include("../php/component.php");
include("../php/operation.php");
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/sell.css">

</head>

<body>

    <main>
        <!-- <div class="container "> -->
        <h1 class="bg-dark p-3 text-light rounded text-center"><i class="fas fa-swatchbook"></i> Readers Cave<br>
            <h4 class="py-2 bg-dark text-light rounded text-center"><i class="fas fa-book"></i> Sell Your Book here</h4>
        </h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "book_id", setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name", ""); ?>
                </div>
                <div class="pt-2">
                    <?php fileIMG("<i class='fas fa-camera'></i>", "book img", "book_img", ""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-edit'></i>", "Description", "book_Description", ""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-edit'></i>", "eg.contact details", "seller_info", ""); ?>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-award'></i>", "book_type (eg.fiction,horror)", "book_publisher", ""); ?>
                    </div>
                    <div class="col">
                        <?php inputnum("<i class='fas fa-rupee-sign'></i>", "Price", "book_price", ""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-shopping-cart'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Sell'"); ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                    <?php deleteBtn(); ?>
                </div>
            </form>
        </div>
        <!-- BACK BUTTON -->
        <div class=backutton>
            <a href="admin_page.php">
                <center><i class='fas fa-arrow-circle-left' style='font-size:48px;color:black'></i></center>
            </a>
        </div>
        <!-- Bootstrap table  -->
        <div class="d-flex table-data ">
            <table class="table table-striped table-primary ">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Book image</th>
                        <th>Book Type</th>
                        <th>Description</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php


                    if (isset($_POST['read'])) {
                        $result = getData();
                        if ($result) {

                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_id']; ?></td>
                                    <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_name']; ?></td>
                                    <td data-id="<?php echo $row['book_id']; ?>"> <img src="../uploaded_img/?php echo $row['book_img']; ?>" height="80px" width="80px"> </td>
                                    <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                    <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_Description']; ?></td>
                                    <td data-id="<?php echo $row['book_id']; ?>"><?php echo '₹' . $row['book_price']; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['book_id']; ?>"></i></td>
                                </tr>

                    <?php
                            }
                        }
                    }


                    ?>
                </tbody>
            </table>
        </div>


        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="../js/sell.js"></script>
</body>

</html>