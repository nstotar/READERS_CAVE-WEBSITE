<!DOCTYPE html>
<html>

<head>
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .price {
      color: grey;
      font-size: 22px;
    }

    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.7;
    }
  </style>
</head>

<body>
  <?php include('config.php');
  session_start();
  $obookid = $_SESSION['obid'];
  $email = $_SESSION['email'];
  echo $_SESSION['email'];
  echo $email;
  $select_products = mysqli_query($conn, "SELECT * FROM products where bid= '$obookid'") or die('query failed');
  if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
      $cbookimg = $fetch_products['image'];
      $cbookprice = $fetch_products['price'];
      $cbookname = $fetch_products['name'];
      $cid = $fetch_products['bid'];
      $insert_products = mysqli_query($conn, "INSERT INTO payment(`pid`,`email`,`itemid`, `uname`, `amountpaid`)
       VALUES ('','$email','$cid','$cbookname','$cbookprice')");
    }
  } ?>
  <h2 style="text-align:center">Product Cart</h2>

  <div class="card">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRm6FPRBcYQEcKCs6dghE0NTj9Kd64wDiMWRQ&usqp=CAU" alt="Compter book" style="width:100%">
    <h1>Readers Cave</h1>
    <p class="price"></p>
    <p>click on pay to proceed the payment </p>
    <p><button id="rzp-button1">Pay</button></p>
  </div>

</body>

</html>



<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "rzp_test_4xqdfbGkan8jb3", // Enter the Key ID generated from the Dashboard
    "amount": "" * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Reeader cave",
    "description": "Test Transaction",
    "image": "https://thumbs.dreamstime.com/z/open-book-icon-logo-vector-education-icon-logo-open-book-icon-logo-vector-illustration-isolated-o-nwhite-background-140097853.jpg",
    "id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function(response) {
      alert("payment successful");
    },
    "prefill": {
      "name": "ReadersCave",
      "email": "rockragini4@gmail.com",
      "contact": "8123564818"
    },
    "notes": {
      "address": "Razorpay Corporate Office"
    },
    "theme": {
      "color": "#3659cc"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.on('payment.failed', function(response) {
    alert(response.error.code);
    alert(response.error.description);
    alert(response.error.source);
    alert(response.error.step);
    alert(response.error.reason);
    alert(response.error.metadata.order_id);
    alert(response.error.metadata.payment_id);
  });
  document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
  }
</script>