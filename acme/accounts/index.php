<?php

/*
 * ACME Account Controller
 */
session_start();


// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 // Get the accounts model
 require_once '../model/accounts-model.php';
 //Get the Functions Controller
 require_once '../library/functions.php';

// Get the array of categories
	$categories = getCategories();
// var_dump($categories);
//	exit;
 
 $navList = buildNavList($categories);
 // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
 $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 } 
 
 switch ($action){
 case "login":
     include '../view/login.php';
  break;
 case "registration":
     include '../view/registration.php';
     break;
 case 'register':
    // echo 'You are in register'; exit;
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $clientEmail = checkEmail($clientEmail);
  $checkPassword = checkPassword($clientPassword);
  
  
  
  $existingEmail = checkExistingEmail($clientEmail);

// Check for existing email address in the table
if($existingEmail){
 $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
 include '../view/login.php';
 exit;
}
  

  // Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/registration.php';
  exit;
}

// Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
if($regOutcome === 1){
    setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include '../view/login.php';
  exit;
} else {
  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include '../view/registration.php';
  exit;
}
break;
case 'Login':
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);
      
      
      //Check For missing Data
      if(empty($clientEmail) || empty($checkPassword)){
        $message = '<p>Please provide information for all empty login fields.</p>';
        include '../view/login.php';
        exit;
      }
       
      // A valid password exists, proceed with the login process
// Query the client data based on the email address
$clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if(!$hashCheck) {
  $message = '<p class="notice">Please check your password and try again.</p>';
  include '../view/login.php';
  exit;
}
// A valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);
// Store the array into the session
$_SESSION['clientData'] = $clientData;
//$clientFirstname = $_SESSION['clientData']['clientFirstname'];
setcookie('firstname','', strtotime('-1 year'), '/');
// Send them to the admin view
include '../view/admin.php';
exit;
      


    break;
    
 case 'logout':
     session_destroy();
     setcookie('firstname', $clientFirstname, strtotime('-1 year'), '/');
    // unset($_COOKIE["firstname"]);
      header('Location:/acme/index.php');
      exit;
      break;
  
 case 'accountUpdate':
 $clientId = $_SESSION['clientData']['clientId'];
 $clientInfo = getClientInfo($clientId);
 if(count($clientInfo)<1){
  $message = 'Sorry, no account information could be found';
 }
 include '../view/client-update.php';
 exit;
 break;
  
 case 'updateClientInfo':
 $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
 $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
 $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
 $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
 
  $existingEmail = checkExistingEmail($clientEmail);

 if ($_SESSION['clientData']['clientEmail'] != $clientEmail) {
     if($existingEmail){
 $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
 include '../view/client-update.php';
 exit;
}
     
 }
 
 if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
  $message = '<p>Please complete all information for the User.</p>';
  include '../view/client-update.php';
  exit;
 }
 $updateResult = updateClientInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);
 if ($updateResult) {
  $message = "<p class='notice'>Congratulations, Your Account was successfully updated.</p>";
  $_SESSION['message'] = $message;
  $_SESSION['clientData'] = getClientInfo($clientId);
  header('location: /acme/accounts/');
  exit;
 } else {
  $message = "<p class='notice'>Error. Your Account Information was not updated.</p>";
  include '../view/client-update.php';
  exit;
  
 }
 
 break;
 
  case 'updatePassword':
 $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
 $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
 $checkPassword = checkPassword($clientPassword);
     

 if (empty($checkPassword)) {
  $message = '<p>Please complete all information for the User.</p>';
  include '../view/client-update.php';
  exit;
 }
 
 // Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
 
 $updatePassword = updatePassword($hashedPassword, $clientId);
 if ($updatePassword) {
  $message = "<p class='notice'>Congratulations, Your Account was successfully updated.</p>";
  $_SESSION['message'] = $message;
  $_SESSION['clientData'] = getClientInfo($clientId);
  header('location: /acme/accounts/');
  exit;
 } else {
  $message = "<p class='notice'>Error. Your Account Information was not updated.</p>";
  include '../view/client-update.php';
  exit;
 }
 break;
 default:
    include '../view/admin.php';
    exit;

}