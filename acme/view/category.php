
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $type; ?> Products | Acme, Inc.</title>
        
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
            <h1><?php echo $type; ?> Products</h1>
            <?php if(isset($message)){ echo $message; } ?>
            <?php if(isset($prodDisplay)){ echo $prodDisplay; } ?>
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
