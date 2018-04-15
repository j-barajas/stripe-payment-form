<?php

require_once('vendor/autoload.php');

//Using server test key
\Stripe\Stripe::setApiKey('sk_test_8S1f3nXnMyECSzn9hRZpxAZZ');

//Sanitize POSTS
$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$token = $_POST['stripeToken'];

echo $token;

//Create customer in stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//Charge customer
$charge = \Stripe\Charge::create(array(
    "amount" => 5000,
    "currency" => "usd",
    "description" => "Intro To React Course",
    "customer" => $customer->id
));

//Charge output
//print_r($charge);

//Redirect
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);