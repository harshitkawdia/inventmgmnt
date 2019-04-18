<?php
	include("config.php");
   	$error = "";

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
     
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      $usertype=$row['user_type'];
      // If result matched $myusername and $mypassword, table row must be 1 row
         
      if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_user_type'] = $usertype;
        if($_SESSION['login_user_type']==1)
        {
            header("location:dashboard.php");
        }

        else if($_SESSION['login_user_type']==2)
        {
            header("location:userdashboard.php");
        }
        else{
         $error = "Invalid Username";  
        }


      }else {
         $error = "Your Login Name or Password is invalid";
      }
   	}
?>