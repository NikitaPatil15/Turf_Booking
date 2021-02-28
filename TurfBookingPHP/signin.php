<html>
    <head>
        <title>Sign in</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("header.php");
            include("connect.php");
            session_start();
        ?>
    </head>
    <br>
    <br>
    <br>
<?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $u1 = "SELECT EMAIL,SALT,HASH,ACTIVATION FROM meminfo WHERE EMAIL = '$email'"; 
        $u2 = mysqli_query($conn,$u1);
        $u3 = mysqli_num_rows($u2);
        if($u3 == "1")
        {
            $u4 = mysqli_fetch_assoc($u2);
            $salt = $u4['SALT'];
            $acti = $u4['ACTIVATION'];
            if($acti == "1")
            {
                $hash = $u4['HASH'];
                $password = hash('sha256', $pass . $salt); 
                for($round = 0; $round < 65536; $round++) 
                { 
                    $password = hash('sha256', $password . $salt); 
                }
                if($hash === $password)
                {
                    $_SESSION['email'] = $email;
                    echo"<script>window.open('index.php','_self')</script>";
                    $_SESSION['loggedin']=true;
                    exit();
                }else
                {
                    echo "<script>alert('Plese enter correct password !')</script>";
                    echo"<script>window.history.back()</script>";
                    exit();
                }
            }else
            {
                echo "<script>alert('Account not activated!')</script>";
                echo"<script>window.history.back()</script>";
                exit();
            }
        }else
		{
                echo "<script>alert('Not a registered user!')</script>";
                echo"<script>window.history.back()</script>";
                exit();
        }
    }
            
?>
    <body>
        <form class="logform" method="post" action="signin.php">
            <label id="log"><h1>LOGIN</h1></label>
            <br>
            <br>
            <label>Email:</label>
            <br>
            <input type="email" placeholder="Email" name="email" required>
            <br>
            <br>
            <label>Password:</label>
            <br>
            <input type="password" placeholder="Password" name="pass" required>
            <br>
            <br>
            <button type="submit" name="submit" id="login">LOGIN</button>
        </form>
<?php
    if(isset($_GET['activation']))
    {
        $getdata = $_GET['activation'];
        $ar = (explode("=","$getdata"));
        $ar[0];
        $ar[1];
        $chk1 = "SELECT * FROM meminfo WHERE EMAIL = '$ar[0]' AND SALT='ar[1]' AN ACTIVATION='0'";
        $chk2 = mysqli_query($conn,$chk1);
        if(mysqli_num_rows($chk2) == "1")
        {
		$chk3 = "update membersinfo set ACTIVATION='1' where EMAIL='$ar[0]'";
		$chk4 = mysqli_query($conn,$chk3);
		if($chk4)
        {
			echo "<script>alert('Your account is Activated you can sign in now!')</script>";
			echo"<script>window.open('index.php','_self')</script>";
			EXIT();
		}
	    }else
        {
		echo "<script>alert('Improper information provided!!')</script>";
	    }

	}
    if(isset($_POST['sub']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $contact = $_POST['contact'];
        if($conpass == $pass)
            {
                $chk1 = "SELECT EMAIL FROM meminfo WHERE EMAIL = '$email'";
                $chk2 = mysqli_query($conn,$chk1);
                $chk3 = mysqli_num_rows($chk2);
                if($chk3!="0")
                {
                    echo "<script>alert('This user already exists!')</script>";
					echo"<script>window.open('signin.php','_self')</script>";
                    exit();
                }else
                {
                    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                    $password = hash('sha256', $pass . $salt); 
                    $active = "0";
                    for($round = 0; $round < 65536; $round++) 
                    { 
                        $password = hash('sha256', $password . $salt); 
                    }

                } 
                $inst1 = "INSERT INTO meminfo (NAME,EMAIL,PASSWORD,HASH,SALT,CONTACT,ACTIVATION) 
                          VALUES('$name','$email','$pass','$password','$salt','$contact','$active')";
                $inst2 = mysqli_query($conn,$inst1);
                echo"<script>alert('Registeration Successfull!')</script>";
                echo"<script>window.open('index.php','_self')</script>";
            }else
            {
                echo "<script>alert('Confirm password didn't match!')</script>";
                echo "<script>window.history.back()</script>";
                exit();
            }
    }
?>
         <form id="signform" method="post" action="signin.php">
            <label><h1>SIGN UP</h1></label>
            <br>
            <br>
             <label>Name:</label>
            <br>
            <input type="text" placeholder="Name" name="name" required>
             <br>
             <br>
            <label>Email:</label>
            <br>
            <input type="email" placeholder="Email" name="email" required>
            <br>
            <br>
            <label>Password:</label>
            <br>
            <input type="password" placeholder="Password" name="pass" required>
            <br>
            <br>
             <label>Re-enter Password:</label>
            <br>
            <input type="password" placeholder="Re-enter Password" name="conpass" required>
            <br>
            <br>
             <label>Mobile No:</label>
            <br>
            <input type="number" placeholder="Number" name="contact" required>
             <br>
             <br>
            <button type="submit" id="signup" name="sub">SIGNUP</button>
        </form>
    </body>
</html>
