<?php
    include 'include/core.php';
    $myList = "topics";
    $listId = "all";
    $headName = "<h1>Recent Topics</h1>";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET['cat_id'])){
            //echo "category call";
            $myList = "topics";
            $listId = $_GET['cat_id'];
            $headName = "<h1><strong>".trim($_GET['cat_name'])."</h1></strong>";
        }
    }
    //echo "</br> ".$myList." ".$listId;
?>
<html>
    <head>
        <title>Topic Name: </title>
        <?php include 'menu.php'?>
        <link rel="stylesheet" type="html/css" href="css/main.css" >
    </head>
    
    <body>
        <div class="box">
            <div class="content">
             <?php fetchList($myList,$listId,$headName);?>
             
             </table>
            </div>
        </div>
    </body>
</html>