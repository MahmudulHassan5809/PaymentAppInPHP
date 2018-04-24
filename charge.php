<?php 
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('model/Customer.php');
require_once('model/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_YkwG8YiVfVJQrDzJNTco2ou0');

//Sanitize 

$POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Create Customer in stripe

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

$customerData = [
  
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email 
];


//Instantiate Customer

$customer = new Customer();

$customer->addCustomer($customerData);


$transactionData = [
  
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];


//Instantiate Customer

$transaction = new Transaction();

$transaction->addTransaction($transactionData);






//redirect to Success

header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);


?>