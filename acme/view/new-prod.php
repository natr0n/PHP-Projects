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
            <h1>New Product</h1>
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
                        <input type="text" placeholder="Enter Product name" id="invName" name="invName" required <?php if(isset($invName)){echo "value='$invName'";}  ?>>
                    </li>
                     <li>
                        <label>Product Description</label>
                        <input type="text" placeholder="Enter Product Description" id="invDescription" name="invDescription" required <?php if(isset($invDescription)){echo "value='$invDescription'";}  ?> >
                    </li>
                    <li>
                        <label>Product Image: (Path to Image)</label>
                        <input type="text" placeholder="Enter File Path" id="invImage" name="invImage" required <?php if(isset($invImage)){echo "value='$invImage'";}  ?>>
                    </li>
                    <li>
                        <label>Product Thumbnail</label>
                        <input type="text" placeholder="Enter file path"  name="invThumbnail" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> >
                    </li>
                      <li>
                        <label>Product Price</label>
                        <input type="text" placeholder="Enter Price"  name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> >
                    </li>
                     <li>
                        <label># in Stock</label>
                        <input type="text" placeholder="Enter number In Stock" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";}  ?> >
                    </li> 
                    <li>
                        <label>Shipping Size (W x H x L in Inches)</label>
                        <input type="text" placeholder="Enter Shipping Demensions"  name="invSize" required <?php if(isset($invSize)){echo "value='$invSize'";}  ?> >
                    </li>
                    <li>
                        <label>Weight (lbs.)</label>
                        <input type="text" placeholder="Enter Weight"  name="invWeight" required <?php if(isset($invWeight)){echo "value='$invWeight'";}  ?> >
                    </li>
                    <li>
                        <label>Location</label>
                        <input type="text" placeholder="Enter Loacation"  name="invLocation" required <?php if(isset($invLocation)){echo "value='$invLocation'";}  ?> >
                    </li>
                    <li>
                        <label>Vendor Name</label>
                        <input type="text" placeholder="Enter Vendor Name"  name="invVendor" required <?php if(isset($invVendor)){echo "value='$invVendor'";}  ?> >
                    </li>
                    <li>
                        <label>Primary Material</label>
                        <input type="text" placeholder="Enter Material Type"  name="invStyle" required <?php if(isset($invStyle)){echo "value='$invStyle'";}  ?> >
                    </li>
                </ul>
               
                
                       <button type="submit" name="submit" value="add-product">Add Product</button>
                       <!-- Add the action name - value pair -->
                       <input type="hidden" name="action" value="add-product">
                            
            </form>
            
            
        </main>
        
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
