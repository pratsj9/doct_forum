<?php

    
/*------------------------------------------------------------------------------------------------------  
    This is not a good practice of hardcoding Credentials, when I am uploading code on GitHub..
    need to find a way to avoid this.. like reading form external source file
    But php won't allow to access file outside the web directory :( 
------------------------------------------------------------------------------------------------------*/
    
    function dbConnect(){
        $host = "localhost";
        $username = "root";
        $password = "precious";
        $database = "forum";
        
         //global $host, $username, $password, $database;
        $conn = new mysqli($host, $username, $password, $database);
        
        if($conn->connect_error){
            die("</br> Connection Failed ".$conn->connect_error);
        }
        else{
           echo "</br> db Connected: ".$username."@".$host.":".$database;
            return $conn;
        }
    }
    
    function dbInsert($conn, $sql){
        if($conn->query($sql) === TRUE){
            return ;
        }
        else
            echo "</br> Failed: ".$sql."</br>".$conn-error;
    }
    
    function isMailRegistered($your_mail){
        $conn = dbConnect();
        $sql_query = "SELECT `user_id` FROM `users` WHERE `user_email` = '".$your_mail."'";
        //$sql_query = "select * from users";
        $resultSet = $conn->query($sql_query);
        
        /*if Query has a result then,
         *it will return atLeast 1 row.. 
         *else it will return 0 rows
         *more that 1 row is not possible here
        */
        if($resultSet->num_rows == 1){
            //echo "<br> Data is present: ".$resultSet->num_rows." rows";
            $conn->close();
            return true;
        }
        else{
            //echo "<br> Data is Absent: ".$resultSet->num_rows." rows";
            $conn->close();
            return false;
        }
        
    }
    
    function isUsernameRegistered($your_uname){
        $conn = dbConnect();
        $sql_query = "SELECT `user_id` FROM `users` WHERE `user_name` = '".$your_uname."'";
        $resultSet = $conn->query($sql_query);
    
        if($resultSet->num_rows == 1){
            $conn->close();
            return true;
        }
        else{
            $conn->close();
            return false;
        }
        
    }
/*------------------------------------------------------------------------------------------------------------------------*/
   //email address validation
    function emailValidation($your_email){
        if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$your_email)){
            echo "</br> valid mail...";
            return true;
        }
        else{
            echo "</br> INvalid mail !!!!";
            return false;
        }
    }
?>