

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
            <h1>Add A Category</h1>
            <p>Add a new category of products below</p>
            
               <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
          
            <form id="login" action="/acme/products/index.php" method="post">
                
                <ul>
                    <li>
                        <label>New Category Name</label>
                        <input type="text" placeholder="Enter First Name" id="categoryName" name="categoryName" required>
                    </li>
                </ul>
                <button type="submit" name="submit" value="addCategory">Add Category</button>
              <input type="hidden" name="action" value="addCategory">
            </form>
           
            
            
        </main>
        
        <footer>
             <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
