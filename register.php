<?php
  include 'include/core.php';
  /* core.php includes
   * $conObj = dbConnect() -> to get connection object.
   * dbInsert("sql") -> to insert data into table, must be validated before
   * emailValidation("email") -> validates your email.. will also require in login form
   * isMailRegistered("email") -> check if email already registred
   * isUsernameRegistered("username") -> Check if Username already taken
  */
  $message = "";
    
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $emailid = $password ="";
    
    $username = trim($_POST['username']);
    $emailid = trim($_POST['email']); //lets avoid extra spaces..
    $password = trim($_POST['password']);
    
    //check if they are not blank....
    if(!empty($username) && !empty($emailid) && !empty($password)){
        //now check valid email..
        if(emailValidation($emailid)){
          //check if email is Already Registered
            if(!isMailRegistered($emailid)){
                //check if Username is Already Taken
                  if(!isUsernameRegistered($username)){
                    //YOU came a long Way....All is Valid
                        $conn = dbConnect();
                        $sql_query = "INSERT INTO `users`(`user_name`, `user_pass`, `user_email`)
                        VALUES ('".$username."','".$password."','".$emailid."')";
                        dbInsert($conn,$sql_query);
                        $message= "</br> <h1>Welcome ".$username."
                                   </br> Please Login</h1></br>";
                        $conn->close();
                        redirect("http://localhost/forum/login.php?message=".$message);
                  }
                  else{
                    $message = $message." UserName Already Taken..!";
                  }
            }
            else{
              $message = $message." Mail Already Registered..!";
            }
      
        }
        else{
          $message = $message." Invalid Mail..!";
        }
        
    }
    else
    {
      $message = "<br><h1>All fields are required.</h1>";
    }
    /*
    
    $conn = dbConnect();
    $sql_query = "INSERT INTO `users`(`user_name`, `user_pass`, `user_email`)
                  VALUES ('".$username."','".$password."','".$emailid."')";
    dbInsert($conn,$sql_query);
    $message= "</br> <h1>Welcome ".$username."...</h1></br>";
    $conn->close();
    */
  }
?> 
<html>
<head>
  <?php include 'menu.php'?>
  <title>User Registration</title>  
  <link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="html/css" href="css/auth.css" >
</head>
<body>
  <div class="box">
    <div class="content">
      
      <?php echo $message;?>
      <h1><strong>User Registration</strong></h1>
      
      <form method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input class="field" type="text" name="username" placeholder="user name"><br>
          <input class="field" type="text" name="email" placeholder="email id"><br>
          <input class="field" type="password" name="password" placeholder="password"><br>
          <input class="btn" type="submit" value="Register">
      </form>
      
    </div>
  </div>
</body>
</html>