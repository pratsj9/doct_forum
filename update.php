
<?php
    include 'menu.php';
    include 'include/core.php';
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
        $col_name = "";
        $col_description = "";
        $table_name = "";
        $col_id = "";
        
        if(!isset($_GET['type']))
            redirect(getCheckPoint());
            
        $type = $_GET['type'];
        $id = $_GET['id'];
        $name = $_GET['name'];
        
        if(empty($name) || empty($type))
            redirect(getCheckPoint());
            
        if(isset($_GET['description']))//no description in comments.. so 
            $description = $_GET['description'];
        
        
        switch($type){
            case "categories":
                $col_name = "cat_name";
                $col_description = "cat_description";
                $table_name = "categories";
                $col_id = "cat_id";
                $sql_query = "update $table_name set $col_name='$name', $col_description='$description' where $col_id=$id";
            break;
        
            case "topics":
                $col_name = "topic_title";
                $col_description = "topic_description";
                $table_name = "topics";
                $col_id = "topic_id";
                $sql_query = "update $table_name set $col_name='$name', $col_description='$description' where $col_id=$id";
            break;
        }
        
        echo $sql_query;
        $conn = dbConnect();
        dbInsert($conn,$sql_query);
        $conn->close();
        
        redirect(getCheckPoint());
        
        /*select cat_name, cat_description from categories where cat_id = 1*/
    }
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = 0; //trying to declare id as integer var
        $id = trim($_POST['id']);
        $type = trim($_POST['type']);
        $name = $_POST['name'];
        $description = $_POST['description'];
        $input_message = "<input class=\"field\" type=\"text\" name=\"name\" value=\"$name\"></br>".
                         "<input class=\"field\" type=\"text\" name=\"description\" value=\"$description\">".
                         "<input class=\"field\" type=\"hidden\" name=\"id\" value=\"$id\">".
                         "<input class=\"field\" type=\"hidden\" name=\"type\" value=\"$type\">";
        
        
        
        
        
/*if method is post only then show the page body*/
?>
<html>
    <head>
        <title>Update</title>
        
        <link rel="stylesheet" type="html/css" href="css/main.css" >
    </head>
    
    <body>
         <div class="box">
            <div class="content">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <?php
                        echo $input_message;
                    ?>
                    <input class="btn" type="submit" value="UPDATE">
                </form>
            </div>
         </div>
    </body>
</html>
<?php
        
        echo $id.$type;
    }
?>
