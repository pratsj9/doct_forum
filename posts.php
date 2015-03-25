<?php
    $topic_title = "";
    $topic_id = "";
    $head_name = "";
    if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_GET['topic_id'])){      
                $topic_title =  $_GET['topic_title'];
                $topic_id = $_GET['topic_id'];
                $head_name = "<h1>".$topic_title."</h1>"; 
                //echo "WElcome TO Posts ".$topic_title." ".$topic_id;
        }
    }
?>
<html>
    <head>
         <title>Posts </title>
        <?php include 'menu.php';
              include 'include/core.php';
              setCheckPoint();
              ?>
        <link rel="stylesheet" type="html/css" href="css/main.css" >
    </head>
    <body>
        <div class="box">
            <div class="content">
                <style type = "text/css">
                    th{
                        background: #00bcd4;
                        text-shadow: none;
                        font-size: 28px;
                    }
                    td{
                        padding: 5px 5px;/*left right text margin*/
                        text-align: justify;
                        font-family: 'Ubuntu Mono', sans-serif;
                        
                    }
                    .dt{
                        font-size: 12px;
                    }
                    .auther{
                        font-size: 15px;
                    }
                    
                </style>
                <?php
                    fetchList("posts",$topic_id,$head_name);
                ?>
                </table>
            </div>
        </div>
        
        <?php
        if(!isLogged()){
            /*hiding Create Topic Div
             *if, user is not logged in
            */
        ?>
        <style type="text/css"> #usercheck{ display: none; }</style>
        <?php
        }
        ?>
        <div id="usercheck" class="box">
            <div class="content">
                <h1>New Comment</h1>
                <form method="post"action="createPost.php"">
                    <textarea class="field" type="text" name="comment"
                            rows="5" cols="40" placeholder="description"></textarea><br>
                  <?php
                  echo "<input type=\"hidden\" name=\"topic_id\" value=\"".$topic_id."\">";
                  echo "<input type=\"hidden\" name=\"topic_title\" value=\"".$topic_title."\">";
                  /*
                   *we are passing these hidden values so that we can redirect to same page again
                   *when post is commented
                  */
                  ?>
                    
                    <input class="btn" type="submit" value="CREATE">
               </form>
            </div>
        </div>
    </body>
</html>