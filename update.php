<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = trim($_POST['id']);
        $type = trim($_POST['type']);
        echo $id.$type;
    }
?>