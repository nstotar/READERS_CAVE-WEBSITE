<?php
@include 'config.php';

session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login2.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="home/css">
    <link rel="stylesheet" href="css/preloader.css">
    <title>Document</title>
    <style>
        .sell {
            display: block;
            width: 150px;
            padding: .2rem;
            border: 2px solid skyblue;
            background-color: gray;
            text-align: center;
        }
    </style>
</head>

<body>

    welocome to ReadersCave Dear
    <?php
    echo $_SESSION['user_name'];
    @include 'sidebar.php';

    echo " <div class='home'>";
    @include 'home.php';
    echo " </div> ";
    // echo " <div class='home'>";
    // @include 'rendertable.php';
    // echo " </div> ";

    ?>
</body>

</html>