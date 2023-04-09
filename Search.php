<?php include "sidebar.php" ?>
<?php include "config.php" ?>
<!-- <?php include "php/searchconnection.php.php" ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/Search.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css"> -->

</head>


<body>
    <form action="searchResultDB.php" method="get">
        <h2>ReadersCave</h2>
        <div class="search-container">
            <input type="text" name="page" placeholder="Search for Book Name or Genre" class="search-input">
            <!-- <a href="php/searchconnection.php" class="search-btn"> -->
            <button class="btn" value="btn"><i class="fas fa-search"></i></button>
        </div>

    </form>
    <?php
    if (isset($_GET['btn'])) {
        if (count($results) > 0) {
            foreach ($results as $r) {
                echo "<div>" . $r['book_name'] . "-" . $r['book_publisher'] . "</div>";
            }
        } else {
            echo "<div> .No result found.</div>";
        }
    }
    ?>
</body>

</html>