<?php
session_start();
session_status();
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
          <li><a href="topicList.php"><span>Topics</span></a></li>
          <li><a href="#"><span>recent </span></a></li>
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
                  else
                    print("<li><a href=\"logout.php\">Logout</a></li>");
              ?>
              
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </body>
</html>