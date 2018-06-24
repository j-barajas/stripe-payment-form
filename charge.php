<?php

require_once('vendor/autoload.php');
require_once('config/pdo_db.php');
require_once('lib/pdo_dbh.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

//Using server test key
\Stripe\Stripe::setApiKey('sk_test_h8okKIWnnq4C4MYbUJPkdcKW');

//Sanitize POSTS
$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$token = $_POST['stripeToken'];

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

//Generate customer data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

//Add customer data to database
$customer = new Customer();
$customer->addCustomer($customerData);

//Generate transaction data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,
  ];
  
  //Add transaction data to database
  $transaction = new Transaction();
  $transaction->addTransaction($transactionData);

//Charge output
//print_r($charge);

//Redirect
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);