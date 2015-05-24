<?php
include 'include/core.php';
session_start();
    if($_SERVER['REQUEST_METHOD']=="POST"){
            $cat_id = trim($_POST['cat_id']);
            $cat_name = trim($_POST['cat_name']);
            $topic_name = trim($_POST['topic_name']);
            $topic_Description = trim($_POST['topic_desc']);
            $topic_auther = trim($_SESSION['user_name']);
            
            if(!empty($topic_name) && !empty($topic_Description)){
                $sql_query = "INSERT INTO topics (topic_title, topic_description, category_id,
                             topic_auther)
                              VALUES ('$topic_name', '$topic_Description', '$cat_id', '$topic_auther')";
                $conn = dbConnect();
                dbInsert($conn, $sql_query);
                $conn->close();
                              
            }
            /*redirection mechanism */
            if($cat_id=="all" && $cat_name=="all")
                $url = "topicList.php";
            else                
                $url = "topicList.php?cat_id=".$cat_id."&cat_name=".$cat_name;
                
           redirect($url);
    }
/*INSERT INTO `forum`.`topics` (`topic_id`, `topic_title`, `topic_description`, `category_id`, `topic_auther`)
     *VALUES (NULL, 'this g', 'this ia g', '8', 'abc');
    */
?>