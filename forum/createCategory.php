<?php
  include 'menu.php';
  include 'include/core.php';
  $message = "";
  
  if(!isSu()){
    /*Someone probabaly accessing it directly.. send him to Home.. ;)
     *we can stil put this createCategory.php in 'include/' folder (which will block all direct url access) But,
     *we are not able to acces menu.php from there. So till then Use classic Thing
    */
    redirect('index.php');
  }
  
  if($_SERVER['REQUEST_METHOD']=="POST"){
      $name = trim($_POST['cat_name']);
      $description = trim($_POST['cat_desc']);
      
      if(!empty($name) && !empty($description)){
       // echo "</br> Fields Full..";
          //------------
          makeCategory($name,$description);
          $message = "Category '$name' Created.";
      }
      else{
        $message = "All fields are Required";
      }
    
  }
?>
<html>
<head>
  
  <title>Create Category</title>
  
  <link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="html/css" href="css/auth.css" >
</head>
<body>
  <div class="box">
    <div class="content">
      <h1><?php echo $message; ?></h1>
      <h1><strong>Create Category</strong></h1>
      <form method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input class="field" type="text" name="cat_name" placeholder="category name"><br>
          <textarea class="field" type="text" name="cat_desc"
                    rows="5" cols="40" placeholder="description"></textarea><br>
          <input class="btn" type="submit" value="Make">
      </form>
    </div>
  </div>
</body>
</html>