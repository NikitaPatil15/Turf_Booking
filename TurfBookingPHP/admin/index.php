<?php
include("../connect.php");
session_start();
if(isset($_POST["signin"])){

	$username = mysqli_real_escape_string($conn,$_POST["user_name"]);
	$password = mysqli_real_escape_string($conn,$_POST["pass_word"]);
	
		$ql = "SELECT USERNAME FROM admininfo WHERE USERNAME='$username' LIMIT 1"; 
		$res = mysqli_query($conn,$ql);
		if (mysqli_num_rows($res) == 1){
			$ry = "SELECT * FROM admininfo WHERE USERNAME='$username'";
			$sql = mysqli_query($conn,$ry);
			$rows = mysqli_fetch_assoc($sql);
			
						if($password === $rows['PASSWORD']){
							@$_SESSION['username']=$username;
							echo"<script>window.open('statemaster.php','_self')</script>";
							exit();	
						}else{
							echo"<script>alert('Wrong EMAIL or PASSWORD')</script>";
							echo"<script>window.history.back()</script>";
						}
										
				
		}else{
			echo"<script>alert('Wrong EMAIL or PASSWORD')</script>";
            echo"<script>window.history.back()</script>";
			exit();
		}
	
}

?>
<html>
    <head>
        <title>Admin Panel</title>    
        <link href="css/style.css" rel="stylesheet">    
    </head>
    <body>
        <br>
        <br>
        <br>
        <br>
	    
        <div align="right">
            <form class="form" method="post" action="index.php">
                <center>
                    <h1 align="center">ADMIN PANEL</h1>
                    <br><br> <br><br>
                    Username : 
                    <input type="text"  placeholder="Enter your user name" name="user_name" required>
                    <br><br>
                    Password : 
                    <input type="password"  placeholder="Enter your password" name="pass_word" required>
                    <br><br>
                    <button type="submit" name="signin" class="signin">Sign In</button>
                </center>
            </form>
            <br>
        </div>
    </body>
</html>

