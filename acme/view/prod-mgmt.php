<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
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
            <h1>Product Management</h1>
          
            <form id="login"  method="post">
                
                <ul>
                    <li>
                        <a class="login-width" href="/acme/products/index.php?action=new-cat">Add a Category</a>
                    </li>
                    <li>
                        <a class="login-width" href="/acme/products/index.php?action=new-prod">Add a New Product</a>
                    </li>
                </ul>
              
            </form>
           
            <?php
if (isset($message)) {
 echo $message;
} if (isset($prodList)) {
 echo $prodList;
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
