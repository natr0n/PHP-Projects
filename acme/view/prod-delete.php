<?php
if($_SESSION['clientData']['clientLevel'] < 2){
 header('location: /acme/');
 exit;
}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>
        
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
            <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>
            <p>Confirm Product Deletion. The delete is permanent.</p>
                    <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
            <form id="login" action="/acme/products/index.php" method="post">
                      
                <ul>
                    
                    <li>
                        <label>Product Name:</label>
                        <input type="text" placeholder="Enter Product name" id="invName" name="invName" readonly <?php if(isset($invName)){ echo "value='$invName'"; } elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>>
                    </li>
                     <li>
                        <label>Product Description</label>
                        <input type="text" placeholder="Enter Product Description" id="invDescription" name="invDescription" readonly <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($prodInfo['invDescription'])) {echo "value='$prodInfo[invDescription]'"; } ?> >
                    </li>
                    <li>
                        
                </ul>
               
                
                         <label>&nbsp;</label> 
  <input type="submit" class="regbtn" name="submit" value="Delete Product">

  <input type="hidden" name="action" value="deleteProd">
  <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
                            
            </form>
            
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
