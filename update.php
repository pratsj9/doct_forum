<?php
    include 'include/core.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = trim($_POST['id']);
        $type = trim($_POST['type']);
/*if method is post only then show the page body*/
?>
<html>
    <head>
        <title>Update</title>
        <?php include 'menu.php'?>
        <link rel="stylesheet" type="html/css" href="css/main.css" >
    </head>
    
    <body>
        
    </body>
</html>
<?php
        
        echo $id.$type;
    }
?>
