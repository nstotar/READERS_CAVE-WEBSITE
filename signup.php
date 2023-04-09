<?php

@include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $user_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $pass3 = md5($_POST['password1']);

    //checking existence of a user for singup

    // reading from the database
    $select = " SELECT * FROM users1 WHERE email = '$email' ";

    // connecting to the databse by $conn
    $result = mysqli_query($conn, $select);

    // user already exists validation
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user  with this email , ' . $email . ' already exist!';
    }

    // user name validation
    elseif (strlen($user_name) < 5) {
        $error[] = 'User Name should be at least 5 characters in length';
    }

    // email validation
    elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        //  if email is valid checking for password validation (refer html form 118 ,122)

        if ($pass1 == $pass2) {

            $uppercase = preg_match('@[A-Z]@', $pass1);
            $lowercase = preg_match('@[a-z]@', $pass1);
            $number    = preg_match('@[0-9]@', $pass1);

            // checking for strength of a password

            if (!$uppercase || !$lowercase || !$number || strlen($pass1) < 8) {

                $error[] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }

            // if user has given strong password 
            else {

                echo "user added";

                $user_id = (rand(10000, 10000000));
                $user_name = "$user_name" . "$user_id";

                // hasing the password and storing it into the table
                $pass1 = md5($_POST['password1']);
                $pass2 = md5($_POST['password2']);

                // stroing new user deatils to the table
                $query = "insert into users1 (user_name, email , password1) values ('$user_name' , '$email','$pass1')";
                mysqli_query($conn, $query);

                // redirecting them to the login page
                header('location:login2.php');
            }
        } else {
            $error[] = 'Passwords are not matched!';
        }
    } else {
        $error[] = 'Enter a  valid Email';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/signup4.css">
</head>

<body>

    <div class="card" id="card">

        <div class="info" id="info">
            <!-- <button id="btn">click</button> -->
            <img class="login-image" src="img/i2.avif" alt="book image" height="717px" width="656">
        </div>



        <div class="form-container" id="form-container" style="padding-bottom: 20px;">

            <form action="" method="post">
                <h3>Register Now</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>

                <!-- 1 -->
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $user_name : ''; ?>" required placeholder="Create your User Name">

                <!-- 2 -->
                <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required placeholder="Enter your Email">

                <!-- 3 -->
                <input type="password" name="password1" required placeholder="Create your Readers Cave password">

                <!-- 4 -->
                <input type="text" name="password2" required placeholder="Confirm your Readers Cave password">

                <input type="submit" name="submit" value="Register Now" class="form-btn">
                <p>Already have an account? <a href="login2.php">Login Now</a></p>
                <p><a class="forget-p" href="forget.php"> Forgot your password </a></p>
            </form>

        </div>

    </div>

</body>

</html>