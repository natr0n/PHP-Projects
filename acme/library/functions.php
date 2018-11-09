<?php

/* 
 * EXTRA FUNCTIONS
 */

function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
 return preg_match($pattern, $clientPassword);
}


function buildNavList($categories){
    // Build a navigation bar using the $categories array
 $navList = '<ul>';
 $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
 foreach ($categories as $category) {
  $navList .= "<li><a href='/acme/products/?action=category&type=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
 }
 
 $navList .= '</ul>';
 //echo $navList;
 return $navList;
}

function buildProductsDisplay($products){
 $pd = '<ul id="prod-display">';
 foreach ($products as $product) {
  $pd .= '<li>';
  $pd .= "<a href='/acme/products/?action=detailView&id=".urlencode($product['invId'])."' title='View our $product[invName] product line'> <img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
  $pd .= '<hr>';
  $pd .= "<h2>$product[invName]</h2></a>";
  $pd .= "<span>$product[invPrice]</span>";
  $pd .= '</li>';
 }
 $pd .= '</ul>';
 return $pd;
}

function buildDetailDisplay($prodDetail){
 $pd = '<div id="prodDetail">';
  $pd .= '<div class="prodDetailImage">';
  $pd .= "<img src='$prodDetail[invImage]' alt='Image of $prodDetail[invName] on Acme.com'>";
  $pd .= '</div>';
  $pd .= '<div class="prodDetailWords">';
  $pd .= "<h2>$prodDetail[invName]</h2>";
  $pd .= "<p>$prodDetail[invDescription]</p>";
  $pd .= "<p>A $prodDetail[invVendor] Product</p>";
  $pd .= "<p>Primary Material: $prodDetail[invStyle]</p>";
  $pd .= "<p>Product Weight: $prodDetail[invWeight]lbs.</p>";
  $pd .= "<p>Shipping Size: $prodDetail[invSize] (W X L X H)</p>";
  $pd .= "<p>Ships From: $prodDetail[invLocation]</p>";
  $pd .= "<p>Left In Stock: $prodDetail[invStock]</p>";
  $pd .= "<p class='productPrice'>$$prodDetail[invPrice]</p>";
  $pd .= '</div>';
  $pd .= '</div>';
 return $pd;
}

function buildFeature($featuredItem){
  $pd = '<div id="prodDetail">';
  $pd .= '<div class="prodDetailImage">';
  $pd .= "<img src='$featuredItem[invImage]' alt='Image of $featuredItem[invName] on Acme.com'>";
  $pd .= '</div>';
  $pd .= '<div class="prodDetailWords">';
  $pd .= "<p>$featuredItem[invDescription]</p>";
  $pd .= '<a href="#"> <img class="ctaButton" src="/acme/images/site/iwantit.gif" alt="I want it button"></a>';
  $pd .= '</div>';
  $pd .= '</div>';
 return $pd;
}