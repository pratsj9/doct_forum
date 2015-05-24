<?php
include 'include/core.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        session_start();
        
        $comment = $_POST['comment'];
        $topic_id = $_POST['topic_id'];
        $topic_title = $_POST['topic_title'];
        $auther = $_SESSION['user_name'];
        $currunt_date = date("Y-m-d");
        
        $url = "posts.php?topic_id=".$topic_id."&topic_title=".$topic_title."";
        
        if(!empty($comment)){
            
            $sql_query = "INSERT INTO `posts`(`topic_id`, `post_content`, `post_auther`, `post_date`)
                        VALUES ('$topic_id', '$comment', '$auther', '$currunt_date')";
            
            $conn = dbConnect();
            dbInsert($conn,$sql_query);
                
        }
        echo $sql_query;
        redirect($url);
    }
?>