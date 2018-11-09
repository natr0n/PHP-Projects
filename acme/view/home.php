<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home | Acme</title>
        
        <!-- Linking Style Sheet -->
        <link rel="stylesheet"  media="screen" href="/acme/css/style.css">
        
    </head>
    <body>
        <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
        <nav class="secondaryNav">
<!--         <ul>
                  <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Cannon</a></li>
                    <li><a href="#">Explosive</a></li>
                    <li><a href="#">Misc</a></li>
                    <li><a href="#">Rocket</a></li>
                    <li><a href="#">Trap</a></li>
                </ul>-->
<?php echo $navList; ?>
        </nav>
        
        <main>
            <h1>Welcome to Acme!</h1>
           <!-- <div class="callToAction"> -->
             <!-- <img class="rocketImage" src="/acme/images/site/rocketfeature.jpg" alt="rocket man"> -->
               <!-- <div class="rocketText"> -->
                   <?php if (isset($display)) {
 echo $display;
}?>
                    
                    
                    
                    
                    
<!--                  <h2>ACME Rocket</h2>
                  <h3>Quick Lightning Fuse</h3>
                  <h3>NHTSA Approved Seat Belts</h3>
                  <h3>Mobile launch stand included</h3>
                  <a href="#"> <img class="ctaButton" src="/acme/images/site/iwantit.gif" alt="I want it button"></a> 
                </div>
            </div> -->
           
        <div class="sectionTwo">
            
               <div class="recipies"> 
                    <h2>Featured Recipes</h2>
                    <ul>
                        <li> <img src="/acme/images/recipes/bbqsand.jpg" alt="BBQ pulled pork sandwich"></li>
                        <li>  <img src="/acme/images/recipes/potpie.jpg" alt="BBQ pot pie"></li> 
                         <li class="text-color">
                            <a href="#"><p>RoadRunner Pot Pie</p></a></li>
                         <li class="text-color">
                           <a href="#"><p>Pulled Roadrunner BBQ</p></a></li>
                         <li>   <img src="/acme/images/recipes/soup.jpg" alt="Roadrunner soup"></li>
                         <li>  <img src="/acme/images/recipes/taco.jpg" alt="Roadrunner taco's"></li>
                        <li class="text-color">
                             <a href="#"><p>Road Runner Soup</p></a></li>
                        <li class="text-color">
                               <a href="#"><p>Roadrunner Tacos</p></a></li>
               </ul>
            </div>
            
<!--            <div class="reviews">
                <h2>Acme Rocket Reviews</h2>
                <ul>
                    <li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
                    <li>"That thing was fast!" (4/5)</li>
                    <li>"Talk about fast delivery." (5/5)</li>
                    <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                    <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
                </ul>
            </div>-->
            
        </div>

        </main>
        <footer>
            <hr>
       <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
       
    </body>
</html>
