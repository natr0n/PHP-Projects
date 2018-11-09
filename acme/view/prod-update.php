<?php
// Build a navigation bar using the $categories array
 $catList = '<select name="categoryId">';
 $catList .= "<option>Please Choose a Category</option>";
 foreach ($categories as $category) {
     $catList .= "<option value='$category[categoryId]'";
     if(isset($categoryId)){
         if ($category['categoryId'] === $categoryId){
             $catList .= 'selected';
         }
     } elseif(isset($prodInfo['categoryId'])){
  if($category['categoryId'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
  }
}
         
  $catList .= ">$category[categoryName]</option>";
 }
 
 $catList .= '</select>';
 ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?> | Acme, Inc</title>
        
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
            <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} elseif(isset($invName)) { echo $invName; }?></h1>
                    <?php
                        if (isset($message)) {
                            echo $message;
                        }
                        ?>
            <form id="login" action="/acme/products/index.php" method="post">
                       <p>*All Fields are Required*</p>
                <ul>
                    <li class="scroll-list">
                        <label>Categories</label>
                         <?php echo $catList; ?>
                    </li>
                    <li>
                        <label>Product Name:</label>
                        <input type="text" placeholder="Enter Product name" id="invName" name="invName" required <?php if(isset($invName)){ echo "value='$invName'"; } elseif(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>>
                    </li>
                     <li>
                        <label>Product Description</label>
                        <input type="text" placeholder="Enter Product Description" id="invDescription" name="invDescription" required <?php if(isset($invDescription)){echo "value='$invDescription'";} elseif(isset($prodInfo['invDescription'])) {echo "value='$prodInfo[invDescription]'"; } ?> >
                    </li>
                    <li>
                        <label>Product Image: (Path to Image)</label>
                        <input type="text" placeholder="Enter File Path" id="invImage" name="invImage" required <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {echo "value='$prodInfo[invImage]'"; } ?>>
                    </li>
                    <li>
                        <label>Product Thumbnail</label>
                        <input type="text" placeholder="Enter file path"  name="invThumbnail" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {echo "value='$prodInfo[invThumbnail]'"; }  ?> >
                    </li>
                      <li>
                        <label>Product Price</label>
                        <input type="text" placeholder="Enter Price"  name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {echo "value='$prodInfo[invPrice]'"; }  ?> >
                    </li>
                     <li>
                        <label># in Stock</label>
                        <input type="text" placeholder="Enter number In Stock" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {echo "value='$prodInfo[invStock]'"; }  ?> >
                    </li> 
                    <li>
                        <label>Shipping Size (W x H x L in Inches)</label>
                        <input type="text" placeholder="Enter Shipping Demensions"  name="invSize" required <?php if(isset($invSize)){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {echo "value='$prodInfo[invSize]'"; }  ?> >
                    </li>
                    <li>
                        <label>Weight (lbs.)</label>
                        <input type="text" placeholder="Enter Weight"  name="invWeight" required <?php if(isset($invWeight)){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {echo "value='$prodInfo[invWeight]'"; }  ?> >
                    </li>
                    <li>
                        <label>Location</label>
                        <input type="text" placeholder="Enter Loacation"  name="invLocation" required <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {echo "value='$prodInfo[invLocation]'"; }  ?> >
                    </li>
                    <li>
                        <label>Vendor Name</label>
                        <input type="text" placeholder="Enter Vendor Name"  name="invVendor" required <?php if(isset($invVendor)){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {echo "value='$prodInfo[invVendor]'"; }  ?> >
                    </li>
                    <li>
                        <label>Primary Material</label>
                        <input type="text" placeholder="Enter Material Type"  name="invStyle" required <?php if(isset($invStyle)){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {echo "value='$prodInfo[invStyle]'"; }  ?> >
                    </li>
                </ul>
               
                
                       <button type="submit" name="submit" value="Update Product">Modify Product</button>
                       <!-- Add the action name - value pair -->
                       <input type="hidden" name="action" value="updateProd">
                       <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
                            
            </form>
            
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
