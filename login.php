<?php
  
  include 'include/core.php';
  $message = "";
  
  if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET['message']))
      $message = $_GET['message'];
  }
  
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $emailid = trim($_POST['email']);
    $password = trim($_POST['password']);
    
      if(!empty($emailid) && !empty($password)){
        //echo "</br> Not empty Fields";
          //----------------------------------        
          if(emailValidation($emailid)){
              //echo "</br> Valid email";
              //------------------------------
              if(isMailRegistered($emailid)){
                    //echo "</br> email Registered";
                    //--------------------------
                    if(isUserAuthenticated($emailid,$password)){
                        //$message= "</br> BINGOOOO......";
                        /*Now we should Redirect to Home Page */
                      redirect("index.php");
          
                    }
                    else{
                      $message = "Wrong Password...</br>Please Try Again..!";
                    }
              }
              else{
              $message = "Dear ".$emailid."</br>Your Account Does Not Exist. Please Register";
              }
          }
          else{
            $message = "Invalid email";
          }
      }
      else{
        $message = "All Fields Are REQUIRED..!";
      }
  }
?>
<html>
<head>
  <?php include 'menu.php'?>
  <title>User login</title>
  
  <link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="html/css" href="css/auth.css" >
</head>
<body>
  <div class="box">
    <div class="content">
      <?php echo $message;?>
      
      <h1><strong>User Login</strong></h1>
      <form method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input class="field" type="text" name="email" placeholder="email id"><br>
          <input class="field" type="password" name="password" placeholder="password"><br>
          <input class="btn" type="submit" value="Login">
      </form>
    </div>
  </div>
</body>
</html>