
<html>
  <head>
    <title>Doctors Forum</title>
    
  </head>
  <body>
    <div class="box">
      <div class="content">
      <h1>Welcome to Doctor's Forum</h1>
      <style type = "text/css">
                    th{
                        background: #d50000;
                        text-shadow: none;
                        color: #f3f3f3;
                        padding: 5px 5px;
                    }
                </style>
        <table class="tab">
          <tr><th class="one">Category</th><th class="two">Topics</th></tr>
          <?php
            fetchList("category","all","");
            
          ?>          
        </table>
      </div>
    </div>
  </body>
</html>








<?php
/*
 *
    <div class="box">
      <div class="content">
      <h1>Doctor's Forum</h1>
        <table class="tab">
          <tr>
            <td >New Disease</td>
            <td >By Rohan Sharma</td>
          </tr>
        </table>
      </div>
    </div>
*/
?>