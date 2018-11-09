<?php

/*
 * ACME Controller
 */


// Create or access a Session
 session_start();

// Get the database connection file
 require_once 'library/connections.php';
 // Get the acme model for use as needed
 require_once 'model/acme-model.php';
 //Get the Functions Controller
 require_once 'library/functions.php';
 //GET the Prodcuts Model
 require_once 'model/products-model.php';

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
 default:
     $featuredItem = getFeaturedProductInfo();
     if ($featuredItem != NULL){
        $display = buildFeature($featuredItem);  
     } else {
         $display = "<p>There are no featured items</p>";
     }
    
     include 'view/home.php';
}

