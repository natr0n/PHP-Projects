 
                <ul class="mainNav">
                    <li><img class="acmeLogo" src="/acme/images/site/logo.gif" alt="Acme logo"></li>
                    <li><?php if(isset($cookieFirstname)){
                    echo "<span>Welcome $cookieFirstname</span>"; }?></li>
                    <li><a class="mainNavLink" href='/acme/accounts/index.php?action=login' title="My Account folder"><img class="accountFolder" src="/acme/images/site/account.gif" alt="Red Account Folder" title="My account folder link"></a></li>
                    <li class="account" >
     <?php
if(isset($_SESSION['loggedin'])){
      echo "<a href='/acme/accounts/index.php'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a> <a href='/acme/accounts/index.php?action=logout'>Logout</a>";
      }
      else {
          echo "<a href='/acme/accounts/index.php?action=login' title='my account folder link'>My Account</a>";
      }
?>
 </li>
                </ul>
            
        
        
