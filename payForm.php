<?php
require_once('vendor/autoload.php');
include 'includes/Client.php';
session_start();
$c = new Client();
$myId = $_SESSION['id'];
$total = $_POST['sum'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="template/assets/css/payment_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Pay Page</title>
</head>
<body>
  <div class="container">
    <h2 class="my-4 text-center">Your Total Amount is [$<?=$total?>]</h2>
    <form action="./charge.php" method="post" id="payment-form">
      <div class="form-row">
        </div>
        
        <div id="card-errors" role="alert"></div>
      </div> -->
      <button>Submit Payment</button>
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key=""
        data-amount="<?php echo str_replace(",","",$_GET["price"]) * 100?>"
        data-name="<?php echo "testuct"; ?>"
        data-description="<?php echo "test description"; ?>"
        data-image="<?php echo "template/assets/images/minimart-logo.png"; ?>"
        data-currency="USD"
        data-locale="auto">
        </script>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="template/assets/js/charge.js"></script>
</body>
</html>