<?php
//https://github.com/stripe/stripe-php#composer
require_once('stripe-php-master/init.php');

// supply an API key
\Stripe\Stripe::setApiKey("sk_test_xxxxxxxxxxxxxxxxx");

// get amount
$amount = $_REQUEST['amount'];

$getIntent = \Stripe\PaymentIntent::create([
  "amount" =>$amount,
  "currency" => "GBP",
  "description" => "Test Payment" ,
  'payment_method_types' => ['card'],
]);
$intent = \Stripe\PaymentIntent::retrieve($getIntent->id);
echo json_encode(["status"=>"ok","id"=>$intent->id,"client_secret"=>$intent->client_secret,"amount"=>$intent->amount,"currency"=>$intent->currency]);
?>
