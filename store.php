<?php 
//error_reporting(0);
require_once('stripe-php-master/init.php');

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$amount = $_POST['amount'];
$id = $_POST['id'];

if(isset($_POST["name"])){
   
    \Stripe\Stripe::setApiKey('sk_test_pOwdIvUOTMVF0dNJqQunhHoA');

    //update payment intent with customer data
    \Stripe\PaymentIntent::update(
        $ref,
        [ "receipt_email"=> $email,'metadata' => ['order_id' => 'order12345',"name"=> $name]]
    );
    echo 'success';

}else{
    echo 'failed';
}
?>