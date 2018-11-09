<?php
if(!isset($_SESSION['loggedin'])){
      header('Location:/acme/index.php');
      exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Template | Acme</title>
        
        <!-- Linking Style Sheet -->
        <link rel="stylesheet"  media="screen" href="/acme/css/style.css">
        
    </head>
    <body>
        <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
        
        <nav class="secondaryNav">
            <?php echo $navList; ?>
        </nav>
        
        
        <main>
            
            <h1><?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname'];?></h1>
            <h3>You are Currently Logged In!</h3>
           <?php if (isset($message)) {
 echo $message;
} ;?>
            <ul>
                <li><label>First Name: </label>
                    <?php echo $_SESSION['clientData']['clientFirstname']?></li>
                <li><label>Last Name: </label>
                    <?php echo $_SESSION['clientData']['clientLastname']?></li>
                <li><label>Email Address: </label>
                    <?php echo $_SESSION['clientData']['clientEmail']?></li>  
            </ul>
             <a href="/acme/accounts/index.php?action=accountUpdate">Update Account Information</a>
             <br>
           <?php
if($_SESSION['clientData']['clientLevel'] > 2){
      echo "<h1>Administrative Functions</h1>"
    . "<br>"
              . "<p>Use The Link Below to manage Products</p>"
              . "<br>"
              . "<a href='/acme/products/index.php'>Product Management Page</a>";
      
}
?>
            
           
            
        </main>
        
        <footer>
             <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
<?php unset($_SESSION['message']); ?>