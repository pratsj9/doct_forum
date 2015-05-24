<?php
/*Here Wee define the Messages for the Eye Test*/
//one Left

$test_1L = "<h1>Eye Test 1</h1>
                <h2>Test 1</h2>
                <h3>How do you see the lines?</h3>
                <h4>Exam your RIGHT eye.</h4>
                <h4>- Be 1 Meter From the screen</h4>
                <h4>- Cover Your Left Eye</h4>
                <h4>- Click on the link below that best describes your eye sight</h4>
            <img src=\"img/two_test.png\"></br></br>";
            
$forms_1L = "<form method=\"post\" action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"one_L\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some lines appear darker & clearer than others.\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"one_L\">
            <input type=\"hidden\" name=\"result\" value=\"true\">
            <input type=\"submit\" value=\"The lines equally dark\" class=\"btn\">
        </form>";
//---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+
//One Right
$test_1R = "<h1>Eye Test 2</h1>
                <h3>How do you see the lines?</h3>
                <h4>Exam your LEFT eye.</h4>
                <h4>- Be 1 Meter From the screen</h4>
                <h4>- Cover Your Right Eye</h4>
                <h4>- Click on the link below that best describes your eye sight</h4>
            <img src=\"img/two_test.png\"></br></br>";

$forms_1R = "<form method=\"post\" action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"one_R\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some lines appear darker & clearer than others.\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"one_R\">
            <input type=\"hidden\" name=\"result\" value=\"true\">
            <input type=\"submit\" value=\"The lines equally dark\" class=\"btn\">
        </form>";
//---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+---+
//Second TEst Left Eye
$test_2L = "<h1>Eye Test 3</h1>
                <h3>Focus on the white dot</h3>
                <h4>Exam your LEFT eye.</h4>
                <h4>- Be 1 Meter From the screen</h4>
                <h4>- Cover Your Right Eye</h4>
                <h4>- Click on the link below that best describes your eye sight</h4>
            <img src=\"img/three_test.png\"></br></br>";

            
$forms_2L = "<form method=\"post\" action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_L\">
            <input type=\"hidden\" name=\"result\" value=\"true\">
            <input type=\"submit\" value=\"Your vision is perfect\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_L\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some lines appear wavy or bent\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_L\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some of the squares are missing\" class=\"btn\">
        </form>";

//second Test Right Eye
$test_2R = "<h1>Eye Test 4</h1>
                <h3>Focus on the white dot</h3>
                <h4>Exam your RIGHT eye.</h4>
                <h4>- Be 1 Meter From the screen</h4>
                <h4>- Cover Your Left Eye</h4>
                <h4>- Click on the link below that best describes your eye sight</h4>
            <img src=\"img/three_test.png\"></br></br>";

$forms_2R = "<form method=\"post\" action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_R\">
            <input type=\"hidden\" name=\"result\" value=\"true\">
            <input type=\"submit\" value=\"Your vision is perfect\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_R\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some lines appear wavy or bent\" class=\"btn\">
        </form>
        
        <form method=\"post\"
              action=\"eyetest.php\">
            <input type=\"hidden\" name=\"t1\" value=\"two_R\">
            <input type=\"hidden\" name=\"result\" value=\"false\">
            <input type=\"submit\" value=\"Some of the squares are missing\" class=\"btn\">
        </form>";

?>