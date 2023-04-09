<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: palegreen;
        }

        h1 {
            justify-content: center;
            color: blue;
        }
    </style>
</head>

<body>
    <?php include('config.php');
    session_start();
    $p_no = $_POST['contact'];
    $add = $_POST['Address'];
    $city = $_POST['state'] . "," . $_POST['dist'] . "<br>" . $_POST['city'] . "<br>" . $_POST['zip'];
    $email = $_SESSION['email'];
    $name = $_POST['Name'] . "  " . $_POST['lname'];
    $ordered_B_id = $_SESSION['book_id'];
    echo $add . "<br>" . $p_no . "<br>" . $city . "<br>" . $email . "<br>" . $name . "<br>" . $ordered_B_id;
    $sql = "INSERT INTO `orders`(`order_id`,`book_id`, `p_no`, `Address`, `city`, `email`, `name`) 
            VALUES (default,'$ordered_B_id','$p_no','$add','$city','$email','$name')";
    $result = mysqli_query($conn, $sql);
    if ($result)
        header("location:razorpay/index.php");
    ?>

</body>

</html>