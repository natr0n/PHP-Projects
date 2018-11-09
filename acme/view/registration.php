
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
            <h1>Acme Registration</h1>
                    <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                   <form id="login" action="/acme/accounts/index.php" method="post">
                       <p>*All Fields are Required*</p>
                <ul>
                    <li>
                        <label>First Name:</label>
                        <input type="text" placeholder="Enter First Name" id="clientFirstname" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
                    </li>
                     <li>
                        <label>Last Name:</label>
                        <input type="text" placeholder="Enter Last Name" id="clientLastname" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
                    </li>
                    <li>
                        <label>Email Address:</label>
                        <input type="email" placeholder="Enter Email Address" id="clientEmail" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>
 required placeholder="Enter a valid email address">
                    </li>
                    <li>
                        <label>Password:</label>
                        <span>Your Password must be at least 8 characters and have at least 1 uppercase character, 1 number and 1 special character.</span>
                        <input type="password" placeholder="Enter Password" id="clientPassword" name="clientPassword" required required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </li>
                </ul>
                
                       <button type="submit" name="submit" value="register">Register</button>
                       <!-- Add the action name - value pair -->
                       <input type="hidden" name="action" value="register">
                            
            </form>
            
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
