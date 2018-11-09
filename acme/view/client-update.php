<?php

$fn = $_SESSION['clientData']['clientFirstname'];
$ln = $_SESSION['clientData']['clientLastname'];
$ce = $_SESSION['clientData']['clientEmail'];
$cID = $_SESSION['clientData']['clientId'];
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
            
            <h1>Update Account</h1>
            <p>Use this form to update your name and email information.</p>
               <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
            <form action="/acme/accounts/" method="post">
             <label>First Name</label>
                        <input type="text" placeholder="Enter Loacation"  name="clientFirstname" required <?php if(isset($fn)){echo "value='$fn'";} elseif(isset($clientInfo['clientFirstname'])) {echo "value='$clientInfo[clientFirstname]'"; }  ?> >
                        <br>
                         <label>Last name</label>
                         <br>
                        <input type="text" placeholder="Enter Loacation"  name="clientLastname" required <?php if(isset($ln)){echo "value='$ln'";} elseif(isset($clientInfo['clientLastname'])) {echo "value='$clientInfo[clientLastname]'"; }  ?> >
                        <br>
                         <label>Email Address</label>
                         <br>
                        <input type="text" placeholder="Enter Loacation"  name="clientEmail" required <?php if(isset($ce)){echo "value='$ce'";} elseif(isset($clientInfo['clientEmail'])) {echo "value='$clientInfo[clientEmail]'"; }  ?> >
                        
                        <br>
                       <button type="submit" name="submit" value="updateClientInfo">Update Account</button>
                       <!-- Add the action name - value pair -->
                       <input type="hidden" name="action" value="updateClientInfo">
                         <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($cID)){ echo $cID; } ?>">
                         </form>
            
            
            <h2>Password Change</h2>
            <p>Use this form to change your password.</p>
                    <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
                   <form id="login" action="/acme/accounts/index.php" method="post">
                <ul>
                    <li>
                        <label>Password:</label>
                        <span>Your Password must be at least 8 characters and have at least 1 uppercase character, 1 number and 1 special character.</span>
                        <input type="password" placeholder="Enter Password" id="clientPassword" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    </li>
                </ul>
                
                       <button type="submit" name="submit" value="updatePassword">Change Password</button>
                       <!-- Add the action name - value pair -->
                       <input type="hidden" name="action" value="updatePassword">
                        <input type="hidden" name="clientId" value="<?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} elseif(isset($cID)){ echo $cID; } ?>">
                            
            </form>
            
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
