<html>
<head>
    <title>Doctors Forum</title>
    <?php
    include 'include/core.php';
    include 'menu.php';
    setCheckPoint();
    ?>
    
    <link rel="stylesheet" type="html/css" href="css/main.css" >
</head>
     <?php
        if(!isSu()){
            /*hiding Create Topic Div
             *if, user is not logged in
            */
            ?>
            <style type="text/css"> .icons{ display: none; }</style>
            <?php
        }
    ?>
    <?php include 'categoryList.php'?>
</html>