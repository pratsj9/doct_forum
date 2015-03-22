<?php
//include 'include/core.php'; it is creating redeclaration... ;(

session_start();
//session_status();
    function isSuper(){
      //
       if(isset($_SESSION['user_level'])){
            
            if($_SESSION['user_level']=="1")
                return true;
            else
                return false;
        }
        else
            return false;
    }
?>
<html>
  <head>
    <link rel="stylesheet" type="html/css" href="css/menu.css" >
  </head>
  <body>
   <div id="wrapper">
      <nav>
        <ul class="menu">
          <li><a href="index.php"><span>Home</span></a></li>
          <li><a href="#"><span>About</span></a></li>
          <li><a href="#"><span>Contacts</span></a></li>
          <li><a href="#">
          <span><?php
                  if(isset($_SESSION['user_name'])){
                    echo "hi, ".$_SESSION['user_name'];
                  }
                  else
                    echo "user";
                ?>
          </span></a>
            <ul class="sub-menu">
              <?php
                  if(!isset($_SESSION['user_name'])){
                    print("<li><a href=\"login.php\">Login</a></li>");
                    print("<li><a href=\"register.php\">Register</a></li>");
                  }
                  else{
                      if(isSuper()){
                        //all SupeUser Pages Goes Here....
                        print("<li><a href=\"createCategory.php\">Create Category</a></li>");
                      }
                    print("<li><a href=\"logout.php\">Logout</a></li>");
                  }
              ?>
              
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </body>
</html>