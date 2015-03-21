<?php
    include 'include/core.php';
    $myList = "topics";
    $listId = "all";
    $catName = "all";
    $headName = "<h1>Recent Topics</h1>";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET['cat_id'])){
            //echo "category call";
            $myList = "topics";
            $listId = trim($_GET['cat_id']);
            $catName = trim($_GET['cat_name']);
            $headName = "<h1><strong>".$catName."</h1></strong>";
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
        
        <div class="box">
            <div class="content">
                <h1>Start New Topic</h1>
                <form method="post"action="createTopic.php"">
                
                    <input class="field" type="text" name="topic_name" placeholder="topic name"><br>
                    <textarea class="field" type="text" name="topic_desc"
                            rows="5" cols="40" placeholder="description"></textarea><br>
                  <?php
                  echo "<input type=\"hidden\" name=\"cat_id\" value=\"".$listId."\">";
                  echo "<input type=\"hidden\" name=\"cat_name\" value=\"".$catName."\">";
                  /*this code passes the cat_id and cat_name (along with topic details) to 'TOPIC CREATOR' to,
                   *list the related TOPICS.
                   *don't cofuse here... all this efforts are to make sure that.. when New Topic is created,
                   *user get redirected to Same Topic List where he/she was earliar.
                  */
                  ?>
                    
                    <input class="btn" type="submit" value="CREATE">
               </form>
            </div>
        </div>
        
    </body>
</html>