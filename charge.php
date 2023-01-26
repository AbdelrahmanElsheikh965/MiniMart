<?php
require_once "vendor/stripe/stripe-php/init.php";
include 'includes/Client.php';

$stripeDetails = array(
    "secretKey" => "",        // You can get secretKey      from your stripe account.
    "publishableKey" => ""    // You can get publishableKey from your stripe account.
);

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);

session_start();
$c               = new Client();
$myId            = $_SESSION['id'];
$amounts         = $_POST['amounts'];
$amount          = $_POST["sum"]; 
$desc            = $_POST['titles'];
$contact_name    = "testContact";
$phone           = "testPhone";
$address         = "testAddress" ;
$token           = $_POST["stripeToken"];
$token_card_type = $_POST["stripeTokenType"];
$email           = $_POST["stripeEmail"]; 

$charge = \Stripe\Charge::create([
"amount" => str_replace(",","",$amount) * 100,
"currency" => 'USD',
"description"=>$desc,
"source"=> $token,
]);  

if($charge){
  echo($c->add_payment($charge->id, $_POST["sum"], $amounts, $myId));
  echo "Your Transaction has been Completed Successfully ;) . Your Transaction id is " . $charge->id;
  header("refresh:3; url=index.php");
}