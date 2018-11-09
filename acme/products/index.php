<?php

/*
 * PRODUCTS CONTROLLER 
 */
session_start();

// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 // Get the accounts model
 require_once '../model/accounts-model.php';
 //Get the prodcuts model
 require_once '../model/products-model.php';
 //Get the Functions Controller
 require_once '../library/functions.php';

// Get the array of categories
	$categories = getCategories();
// var_dump($categories);
//	exit;
 
 $navList = buildNavList($categories);
//exit;
  // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
 $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}
 
 
 
 // Build a navigation bar using the $categories array
// $catList = '<select name="categoryId">';
// $catList .= "<option>Please Choose a Category</option>";
// foreach ($categories as $category) {
//  $catList .= "<option value='$category[categoryId]'>$category[categoryName]</option>";
// }
// 
// $catList .= '</select>';
// //echo $navList;
////exit;
//
// 
 
 


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 } 
 
 switch ($action){
 case "new-cat":
     include '../view/new-cat.php';
  break;
 case "new-prod":
     include '../view/new-prod.php';
     break;
 case 'addCategory':
    // echo 'You are in register'; exit;
  $categoryName = filter_input(INPUT_POST, 'categoryName');

  // Check for missing data
if(empty($categoryName)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/new-cat.php';
  exit;
}

// Send the data to the model
$regOutcome = regCategories($categoryName);

// Check and report the result
if($regOutcome === 1){
   header('Location:/acme/products/index.php');
  exit;
} else {
  $message = "<p>Sorry $categoryName, your category was not added. Please try again.</p>";
  include '../view/new-cat.php';
  exit;
}
break;
case 'add-product':
    // echo 'You are in register'; exit;
  $invName = filter_input(INPUT_POST, 'invName',FILTER_SANITIZE_STRING);
  $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
  $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
  $invThumbnail = filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_STRING);
   $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING);
  $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_STRING);
  $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
  $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
  $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_STRING);
  $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
  $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);


  // Check for missing data
if(empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor) || empty($invStyle) ){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/new-prod.php';
  exit;
}

// Send the data to the model
$regOutcome = regProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

// Check and report the result
if($regOutcome === 1){
  $message = "<p>Thanks for adding $invName.</p>";
  include '../view/new-prod.php';
  exit;
} else {
  $message = "<p>Sorry the product $invName, failed to add. Please try again.</p>";
  include '../view/new-prod.php';
  exit;
}
break;
case 'mod':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if(count($prodInfo)<1){
  $message = 'Sorry, no product information could be found.';
 }
 include '../view/prod-update.php';
 exit;
break;

case 'updateProd':
 $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_STRING);
 $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
 $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
 $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
 $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
 $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
 $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
 $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
 $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
 $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
 $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

 if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
  $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
  include '../view/prod-update.php';
  exit;
 }
 $updateResult = updateProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle, $invId);
 if ($updateResult) {
  $message = "<p class='notice'>Congratulations, $invName was successfully updated.</p>";
  $_SESSION['message'] = $message;
  header('location: /acme/products/');
  exit;
 } else {
  $message = "<p class='notice'>Error. $invName was not updated.</p>";
  include '../view/prod-update.php';
  exit;
 }
 break;
 
 case 'del':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if (count($prodInfo) < 1) {
  $message = 'Sorry, no product information could be found.';
 }
 include '../view/prod-delete.php';
 exit;
 break;

 case 'deleteProd':
 $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

 $deleteResult = deleteProduct($invId);
 if ($deleteResult) {
  $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
  $_SESSION['message'] = $message;
  header('location: /acme/products/');
  exit;
 } else {
  $message = "<p class='notice'>Error: $invName was not deleted.</p>";
  $_SESSION['message'] = $message;
  header('location: /acme/products/');
  exit;
 }
 break;
 
 case 'category':
 $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
 $products = getProductsByCategory($type);
 if(!count($products)){
  $message = "<p class='notice'>Sorry, no $type products could be found.</p>";
 } else {
  $prodDisplay = buildProductsDisplay($products);
 }
 //echo $prodDisplay;
//exit;
 include '../view/category.php';
break;
 

 case 'detailView':
 $invId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
 $prodDetail = getProductDetailView($invId);
 //var_dump($prodDetail);
 if(!count($prodDetail)){
  $message = "<p class='notice'>Sorry, no details about this product could be found.</p>";
 } else {
  $prodDisplay = buildDetailDisplay($prodDetail);
 }
 //echo $prodDisplay;
//exit;
 include '../view/product_detail.php';
break;
 
 case 'featuredItem':
 $invId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $featuredProductInfo = getFeaturedProductInfo();
 $currentFeaturedId = $featuredProductInfo['invId'];
 $currentFeaturedName = $featuredProductInfo['invName'];
 $oldFeaturedProduct = changeFeaturedProductNull($currentFeaturedId);
 $updateFeaturedProduct = updateFeaturedProductOn($invId);
 $newlyFeaturedProduct = getFeaturedProductInfo();
 $newName = $newlyFeaturedProduct['invName'];
 $newProductMessage = "<p class='notify'>You have succesfully changed the Previous Featured Item $currentFeaturedName to $newName!";
 $_SESSION['message'] = $newProductMessage;
 header('Location:/acme/products/index.php');
 exit;
 break;
 
default:
    $products = getProductBasics();
 if(count($products) > 0){
  $prodList = '<table>';
  $prodList .= '<thead>';
  $prodList .= '<tr><th>Product Name</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
  $prodList .= '</thead>';
  $prodList .= '<tbody>';
  foreach ($products as $product) {
   $prodList .= "<tr><td>$product[invName]</td>";
   $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
   $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td>";
   $prodList .= "<td><a href='/acme/products?action=featuredItem&id=$product[invId]' title='Click to Feature Item'>Featured</a></td></tr>\n";
           
  }
   $prodList .= '</tbody></table>';
  } else {
   $message = '<p class="notify">Sorry, no products were returned.</p>';
} 
include '../view/prod-mgmt.php';
exit;
}