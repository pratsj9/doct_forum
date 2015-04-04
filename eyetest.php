<?php
        include 'include/core.php';
        include 'menu.php';
        include 'eyetestCore.php';
        setCheckPoint();
              
    $test_no = "";
    $result = "";
    $result_display = "";
    $content_instruction = "";
    $content_form = "";
    
    function getResult($str){
        
        if($str == "true"){
            return "PASS";
        }
        else{
            return "FAIL";
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $test_no = $_POST['t1'];
        $result = $_POST['result'];
        
        switch($test_no){
            
            case "one_L":
                   $result_display = "Your Test 1 Result is: ".getResult($result);
                   //now set content of Test No two
                   $content_instruction = $test_1R;
                   $content_form = $forms_1R;
            break;
        
            case "one_R":
                $result_display = "Your Test 2 Result is: ".getResult($result);
                // Set Contetnt Of Third Test.. That is Test Two Left 
                $content_instruction = $test_2L;
                $content_form = $forms_2L;
            break;
        
            case "two_L":
                $result_display = "Your Test 3 REsult is: ".getResult($result);
                //Set Content Of Fourth Result
                $content_instruction = $test_2R;
                $content_form = $forms_2R;
            break;
            
            case "two_R":
                $result_display = "Your Test 4 Result is: ".getResult($result);
                $content_instruction = "";
                $content_form = "";
            break;
        }
    }
    elseif($_SERVER['REQUEST_METHOD']=="GET"){
        $content_instruction = $test_1L;
        $content_form = $forms_1L;
        $result_display = "";
    }
?>

<html>
    <head>        
        <title>
        Eye Test
        </title>
        <link rel="stylesheet" type="html/css" href="css/auth.css" >
        <link rel="stylesheet" type="html/css" href="css/main.css" >
            
    </head>
    <body>
        <div class="box">
            <div class="content">
            
<?php
    /*if user is loged then only, show contents of Eye test...
    */
    if(isLogged()){
        echo "<h1>".$result_display."</h1>";
        echo $content_instruction;
        echo $content_form;
?>
    </br><a href="eyetest.php">Restart Test</a>
<?php
    }
    else{
        /*Show waring of User Login*/
?>
                <h1>Please Login To Attend Eye test</h1>
<?php
    /*Else Bracket Complete Here...*/
    }
?>
            </div>
        </div>
        
    </body>
</html>