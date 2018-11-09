<?php

/* 
 * Database Connections
 */
function acmeConnect() {
$server = "localhost";
$database = "acme";
$user = "iClient";
$password = "qAuUdeXcSYoEZm8v";
$dsn = 'mysql:host='. $server . ';dbname='.$database;
//$dsn = "mysql:host=$server;dbname=$dbname"; -- WHAT IS THE DIFFERNCE BETWEEN THIS LINE OF CODE AND THE ONE ABOVE
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// Create the actual connection object and assign it to a variable
try {
$acmeLink = new PDO($dsn, $user, $password, $options);
return $acmeLink;
//echo '$acmeLink Link worked Successfully <br>';
} catch(PDOException $exc) {
    header('Location:/acme/view/500.php');
}
}
//acmeConnect();