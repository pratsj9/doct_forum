<?php
include'include/core.php';
include'menu.php';

if(!isLogged()){
    redirect("login.php");
}
$user_id = $_SESSION['user_id'];
$sql_query = "SELECT * FROM users WHERE user_id='$user_id'";

$username = ""; $email = ""; $gender = ""; $dob = "";

$conn = dbConnect();
$resutSet = $conn->query($sql_query);

    if($resutSet->num_rows > 0){
        global $username, $email, $gender, $dob;
        while($row = $resutSet->fetch_assoc()){
            $username = $row['user_name'];
            $email = $row['user_email'];
            $gender = $row['user_gender'];
            $dob = $row['user_dob'];
            
        //echo $gender."</br> ".$dob."</br> ".$username."</br> ".$email;
        }
    }

$conn->close();
?>
<html>
    <head>
        <title>
            welcome <?php echo $username;?>
        </title>
        <link rel="stylesheet" type="html/css" href="css/main.css" >
        <style>
            .content{
                padding-top: 2%;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="content">
                <table class="tab">
                    <tbody>
                        <tr><td>Username</td><td><?php echo $username;?></td></tr>
                        <tr><td>Email</td><td><?php echo $email;?></td></tr>
                        <tr><td>Identity</td><td><?php echo $gender;?></td></tr>
                        <tr><td>Date of Birth</td><td><?php echo $dob;?></td></tr>
                    </tbody>
                </table>
                </br>
            </div>
        </div>
    </body>
</html>