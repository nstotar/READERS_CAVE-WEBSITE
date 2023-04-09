<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login2.php');
}

$orderedbook = $_GET['update'];

$_SESSION['obid'] = $orderedbook;
// echo $_SESSION['obid'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Address Form</title>
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="container  ">
    <h1>Address</h1>
    <div class="row">
        <form class="col s12" action="payment.php" method="post">
            <div class="row">
                <div class="col s12">
                    <label for="country">Country</label>
                    <select id="country" class="browser-default" required title="Please select a country">
                        <option value="in" disabled selected>Select a country</option>
                        <option value="in">india</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input name="Name" id="first_name" type="text" required class="validate" pattern="^\S.{1,23}\S$" title="Please enter a first Name between 3-25 characters" length="25">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input name="lname" id="last_name" type="text" required class="validate" pattern="^\S.{1,23}\S$" title="Please enter a last Name between 3-25 characters" length="25">
                    <label for="last_name">Last Name</label>
                    <!-- <div class="input-field col s12 m12 l6">
                    <input id="street" type="text" required class="validate" pattern="^\S.{1,23}\S$" title="Please enter a last Name between 3-25 characters" length="25">
                    <label for="street">Street</label> -->
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input name="Address" id="address" type="text" required class="validate" pattern="^\S.+" title="Please enter a valid address">
                    <label for="address">Address</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input name="city" id="town" type="text" required class="validate" title="Please enter a valid City/Town" pattern="^\S.+">
                    <label for="town">City/Town</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <input id="Landmark" type="text" required class="validate" title="Please enter a valid City/Town" pattern="^\S.+">
                    <label for="landmark">Landmark</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input name="dist" id="District" type="text" required class="validate" title="Please enter a valid City/Town" pattern="^\S.+">
                    <label for="District">District</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l6">
                    <label for="state">State</label>
                    <select name="state" id="state" class="browser-default" required title="Please select a state">
                        <option value="" disabled selected>Select a state</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Maharshtra">Maharashtra</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Panjab">Panjab</option>
                        <option value="Uttar pradesh">Uttar Pradesh</option>
                        <option value="Goa">Goa</option>
                    </select>
                </div>
                <div class="input-field col s12 m12 l6">
                    <input name="zip" id="zip-code" type="number" required title="Please enter a valid post code
(e.g., 12345)" class="validate">
                    <label for="zip-code">Zip Code</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="email" type="email" required class="validate" title="Please enter a valid email">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">contact_phone</i>
                    <input name="contact" type="number" required title="Please enter a valid phone number " class="validate">
                    <label for="phone-number">Phone Number</label>
                </div>
                <button class="waves-effect waves-dark btn right " type="submit">Next</button>
        </form>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

</body>

</html>