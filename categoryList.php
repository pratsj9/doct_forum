<?php
include 'include/core.php';
?>
<html>
  <head>
    <title>Doctors Forum</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>
  <body>
    <div class="box">
      <div class="content">
      <h1>Welcome to Doctor's Forum</h1>
        <table class="tab">
          <tr><th class="one">Category</th><th class="two">Topics</th><th class="three">Posts</th></tr>
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