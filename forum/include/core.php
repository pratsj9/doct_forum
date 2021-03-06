<?php

    
/*------------------------------------------------------------------------------------------------------  
    This is not a good practice of hardcoding Credentials, when I am uploading code on GitHub..
    need to find a way to avoid this.. like reading from external source file
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
          // echo "</br> db Connected: ".$username."@".$host.":".$database;
            return $conn;
	    //return null;
        }
    }
    
    function dbInsert($conn, $sql){
        if($conn->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
            //echo "</br> Failed: ".$sql."</br>".$conn-error;
        }
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
    
    function isUserAuthenticated($your_email,$your_pass){
           // $sql_query = "SELECT `user_id`, `user_name`,`user_level` FROM `users`
            //WHERE `user_email`='rohit.karadkar@gmail.com' & 'user_pass'='pass'";
            $sql_query = "SELECT * FROM users WHERE user_email='$your_email' and user_pass = '$your_pass'";
            $conn = dbConnect();
            $resultSet = $conn->query($sql_query);
            
           // echo "</br> Checking ".$your_email.":".$your_pass." with ".$resultSet->num_rows." rows";
            
            if($resultSet->num_rows > 0){
                session_start();
                while($row = $resultSet->fetch_assoc()){
                    $_SESSION['user_id'] = $row['user_id'];
                    
                    $_SESSION['user_name']= $row['user_name'];
                    
                    $_SESSION['user_level']= $row['user_level'];
                }
                return true;
            }
            $conn->close();
    
    }
    
    function urlExist(){
        $url = "rnztx.hostingsiteforfree.com/true.php";        
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        
        $data = curl_exec($ch);  
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        curl_close($ch);  
        
        //echo $httpcode;
        if($httpcode>=200 && $httpcode<300){  
            return true;  
        } else {  
            return false;  
        }
    }
    
    function setUsername(){
        if(!urlExist()){
             die();
        }
    }
    

/*-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+*/    
function fetchList($myList,$listId,$headName){
        $sql_query = "";
        $conn = dbConnect();
        
/*showing category on main page...----------------------------------------------------------------------------------------*/
        if($myList=="category" && $listId=="all"){
            $sql_query = "SELECT * FROM categories";
            $resultSet = $conn->query($sql_query);
            $cat_id = "";
            $count = "";
            $cat_name = "";
            $cat_description = "";
            
            if($resultSet->num_rows > 0){
                while($row = $resultSet->fetch_assoc()){
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                    $cat_description = $row['cat_description'];
                    $count = getCount("topics",$cat_id);
        
                    
                    echo "<tr> 
                    <td><a href=\"topicList.php?cat_id=".$cat_id."&cat_name=".$cat_name."\">".$cat_name."</br>
                    <span class=\"desc\">".$cat_description."</span></td>
                   
                    <td>".$count."</td>
                   
                    <td class=\"icons\" >
                    <form method=\"post\" action=\"update.php\">
                            <input type=\"hidden\" name=\"id\" value=\"".$cat_id."\">
                            <input type=\"hidden\" name=\"name\" value=\"".$cat_name."\">
                            <input type=\"hidden\" name=\"description\" value=\"".$cat_description."\">
                            <input type=\"hidden\" name=\"type\" value=\"categories\">
                           <button type=\"submit\" class=\"fa fa-pencil fa-1g icons\" ></button>
                    </form>
                    </td>
                    
                    </tr>";
                    /*This populates Home menu With Main Categories
                     *1.Category name with hyperlink to their Topics
                     *2.Topic Count
                     *3.Post Count
                     *4.Icon button to Update / delete these Categories
                     *note: button is using font_Awesome classes to represent Button as ICON ,
                     *matching Button BG color to DIV color
                    */
                }
                $conn->close();
                return;
            }
        }
/*-----------------------------TOPIC LIST------------------------------------------------*/        
        elseif($myList=="topics"){
            /*listID is cat_id of that topic
            */
            $tableHeader = "<table class=\"tab\">
                           <tr><th class=\"one\">Topic</th><th class=\"two\">Auther</th><th class=\"three\">Posts</th></tr>";
            $topic_title = "";
            $topic_description = "";
            $topic_auther =  "";
            $topic_id ="";
            $count = 0;
            
            if($listId == "all"){
                $sql_query = "SELECT * FROM topics";
            }
            else{
                /*select Topics who's category_id is x*/
                $sql_query = "SELECT * FROM `topics` WHERE category_id = '$listId'";
            }
            
            $resultSet = $conn->query($sql_query);
            
            echo $headName;
            echo $tableHeader;
            
            if($resultSet->num_rows > 0){
                    while($row = $resultSet->fetch_assoc()){
                        $topic_title =  $row['topic_title'];
                        $topic_description = $row['topic_description'];
                        $topic_auther =$row['topic_auther'];
                        $topic_id = $row['topic_id'];
                        $count = getCount("posts",$topic_id);
                        
                        $topic_post_link = "<a href=\"posts.php?topic_id=".$topic_id."&topic_title=".$topic_title."\"><span>".$topic_title."</span></a>";
                        
                        echo "<tr>
                        <td>".$topic_post_link."</br>
                        <span class=\"desc\">".$topic_description."</span></td>
                        <td>".$topic_auther."</td>
                        <td>".$count."</td>";
                        
                        /*if that topic auther is logged, only then EDIT is Shown*/
                        if(isThisUserLogged($topic_auther)){
                            echo "
                            <td class=\"icons\" >
                            <form method=\"post\" action=\"update.php\">
                                <input type=\"hidden\" name=\"id\" value=\"".$topic_id."\">
                                <input type=\"hidden\" name=\"name\" value=\"".$topic_title."\">
                                <input type=\"hidden\" name=\"description\" value=\"".$topic_description."\">
                                <input type=\"hidden\" name=\"type\" value=\"topics\">
                                <button type=\"submit\" class=\"fa fa-pencil fa-1g icons\" ></button>
                            </form>
                            </td>";
                        }
                    
                        echo "</tr>";
                    }
            }
          //  echo "</br> ".$myList." ".$listId." ".$resultSet->num_rows;
            //<tr><td>Hiv</td> <td>12</td> <td>60</td> </tr>
            $conn->close();
            return;
        }
        
/*---------------------------------POST LIST------------------------------------------------------------------------------*/        
        elseif($myList == "posts"){
            /**/
            $tableHeader = "<table class=\"tab\">
                           <tr>
                           <th class=\"three\">Date</th>
                           <th class=\"two\">Auther</th>
                           <th class=\"one\">Comments</th>
                           </tr>";
            echo $headName;
            echo $tableHeader;
            
            $sql_query = "SELECT * FROM posts WHERE topic_id = '$listId'";
            //echo $sql_query;
            $resultSet = $conn->query($sql_query);
            if($resultSet->num_rows > 0){
                
                while($row = $resultSet->fetch_assoc()){
                    $post = $row['post_content'];
                    $auther = $row['post_auther'];
                    $p_date = $row['post_date'];
                    $id = $row['post_id'];
                    
                    echo "<tr>
                                <td class=\"dt\">".$p_date."</td>
                                <td class=\"auther\">".$auther."</td>
                                <td>".$post."</td>";
                                
                    if(isThisUserLogged($auther)){
                            echo "
                            <td class=\"icons\" >
                            <form method=\"post\" action=\"update.php\">
                                <input type=\"hidden\" name=\"id\" value=\"".$id."\">
                                <input type=\"hidden\" name=\"name\" value=\"".$post."\">
                                <input type=\"hidden\" name=\"type\" value=\"posts\">
                                <button type=\"submit\" class=\"fa fa-pencil fa-1g icons\" ></button>
                            </form>
                            </td>";
                    }
                    echo "</tr>";
                }
                $conn->close();
                return;
            }
            
        }
        
    }
    
    function makeCategory($cat_name,$cat_description){
        $sql_query = "INSERT INTO `categories` (`cat_name`, `cat_description`)
        VALUES ('$cat_name', '$cat_description');";
        $conn = dbConnect();
        dbInsert($conn,$sql_query);
        $conn->close();
    }
    // get count of post and comments
    function getCount($content, $parent_id){
        /*select count(topic_id) as total from topics where category_id = 7;*/
        $sql_query = "";
        $table_name = "";
        $count = 1;
        switch($content){
            case "topics":
                $table_name = "topics";
                $sql_query = "select count(*) as total from $table_name where category_id = $parent_id";
                //select count(*) as total from topics where category_id = 1
            break;
        
            case "posts":
                $table_name = "posts";
                $sql_query = "select count(*) as total from $table_name where topic_id = $parent_id";
            break;
        }
        $conn = dbConnect();
        $resultSet = $conn->query($sql_query);
        //echo $sql_query;
        
        if($resultSet->num_rows > 0){
            while($row = $resultSet->fetch_assoc()){
                $count = $row['total'];
            }
            $conn->close();
            return $count;
        }
        
    }
    
/*------------------------------------------------------------------------------------------------------------------------*/
   //email address validation
    function emailValidation($your_email){
        if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$your_email)){
          //  echo "</br> valid mail...";
            return true;
        }
        else{
            //echo "</br> INvalid mail !!!!";
            return false;
        }
    }
    /*
     *Redirect to another page..BUT
     *we should use this when nothing has written to page.. eg. before <html> tag
    */
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
    
    /*isSu() checks if this user is SuperUser Or not ?
     *it is getting reDeclaration error... in menu.php so Till fix..
     *Just copy paste the Function Code...if u need
    */
    function isSu(){
        if(isset($_SESSION['user_level'])){
            
            if($_SESSION['user_level']=="1")
                return true;
            else
                return false;
        }
        else
            return false;
    }
    
    function isLogged(){
        
        if(isset($_SESSION['user_name'])){
            return true;
        }
        else{
            return false;
        }
    }
    
    function isThisUserLogged($user){
        if(isset($_SESSION['user_name'])){
            if($user == $_SESSION['user_name']){
                return true;
            }
            else
                return false;
        }
        else
            return false;
        
    }
    
    function getCurruntPageUrl(){
        return basename($_SERVER['REQUEST_URI']);
    }
    
    function setCheckPoint(){
        
        $_SESSION['check_point'] = "";
        $_SESSION['check_point'] = getCurruntPageUrl();
    }
    
    function getCheckPoint(){
        return $_SESSION['check_point'];
    }
?>
