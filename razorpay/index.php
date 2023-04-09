<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
    body {
        height: 100%;
        margin: 0;
        padding: 5;
        box-sizing: border-box;
        background-image: linear-gradient(135deg, #9708CC, #43CBFF, #9708CC, #43CBFF);
    }

    form {
        margin: 4rem;
    }

    input {
        border: 2px solid gray;
        width: 20%;
        height: 4%;
    }

    #btn {
        width: 5%;
    }
</style>
<center>
    <form>
        <input type="textbox" name="name" id="name" placeholder="Enter your name as in order form" /><br /><br />
        <input type="textbox" name="amt" id="amt" placeholder="Enter The Book amount" /><br /><br />
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
    </form>
</center>

<script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();

        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: "amt=" + amt + "&name=" + name,
            success: function(result) {
                var options = {
                    "key": "rzp_test_4xqdfbGkan8jb3",
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "ReadersCave",
                    "description": "Test Transaction",
                    "image": "./logo.jpeg",
                    "handler": function(response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "thank_you.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });


    }
</script>