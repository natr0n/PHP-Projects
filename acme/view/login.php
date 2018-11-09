
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
            <h1>Acme Login</h1>
             <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
            <form id="login" action="/acme/accounts/index.php" method="post">
                
                <ul>
                    <li>
                        <label for="address">Email Address:</label>
                        <input type="email" placeholder="Enter Email Address" id="address" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                    </li>
                    <li>
                        <label for="password">Password:</label>
                        <span>Your Password must be at least 8 characters and have at least 1 uppercase character, 1 number and 1 special character.</span>
                        <input type="password" placeholder="Enter Password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </li>
                </ul>
                
                <button type="hidden" name="action" value="Login">Login</button>
                <input type="hidden" name="action" value="Login">
               
                <h2>Not a member?</h2>
               <!-- <button>Create an Account</button> -->
             <a href="/acme/accounts/index.php?action=registration">Create an Account</a>       
            </form>
            
            
            
        </main>
        
        <footer>
             <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
