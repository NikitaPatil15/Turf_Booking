<html>
    <head>
        <title>Turf Booking</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
          //  include("header.php");
            include("connect.php");
            session_start();
        ?>
    </head>
    
<?php
    $cdt = date("Y-m-d");
    if(isset($_POST['pbtn']))
    {
        $dt = $_POST['bdate'];
        $st = $_POST['stime'];
        $et = $_POST['etime'];
        $uem = $_SESSION['email'];
        $tid = $_SESSION['turfid'];
        $sql = "SELECT USER_ID FROM meminfo WHERE EMAIL = '$uem'";
        $uid = mysqli_query($conn,$sql);
        if($dt > $cdt)        //Check if date is in Present
        {
            echo "Correct date";
            $chk1 = "SELECT TURF_ID FROM turfbooking WHERE TURF_ID = '$tid'";
            $chk2 = mysqli_query($conn,$chk1);
            $chk3 = mysqli_num_rows($chk2);
            echo $chk3;
            if($chk3!="0")                          //Check wheather turf is already booked if yes, then check if timings clash
            {   
                $chk7 = "SELECT OPEN_TIME FROM turf WHERE TURF_ID = '$tid";
                $q4 = mysqli_query($conn,$chk7);    //Turf Opening Time
                    
                $chk8 = "SELECT CLOSE_TIME FROM turf WHERE TURF_ID = '$tid";
                $q5 = mysqli_query($conn,$chk8);    //Turf Closing Time
                    
                if(strtotime($st)>strtotime($q4) && strtotime($et)<strtotime($q5))
                {
                    $chk4 = "SELECT DATE FROM turfbooking WHERE TURF_ID = '$tid";
                    $q1 = mysqli_query($conn,$chk4);    //Booked turf date
                
                    $chk5 = "SELECT START_TIME FROM turfbooking WHERE TURF_ID = '$tid";
                    $q2 = mysqli_query($conn,$chk5);    //Booked Turf Start Time
                        
                    $chk6 = "SELECT END_TIME FROM turfbooking WHERE TURF_ID = '$tid";
                    $q3 = mysqli_query($conn,$chk6);    //Booked Turf End Time
                        
                    echo "$q1" . "$q2" . "$q3";
                    if($dt>=$q1 && $st>$q3 && $et<$q2)  //Check date as well as timings , date can be the same
                    {
                        $d1 = "INSERT INTO turfbooking(TURF_ID,USER_ID,DATE,START_TIME,END_TIME)        
                               VALUES('$tid','$uid','$dt','$st','$et')";
                        $d2 = mysqli_query($conn,$d1);                                                  //ACTUAL BOOKING
                        echo"<script>alert('Booking Successful!')</script>";
                        echo"<script>window.open('index.php','_self')</script>";
                    }
                    else
                    {
                        echo"<script>alert('Slot Unavailable, Check date/time')</script>";
                        echo "<script>window.history.back()</script>";
                    }
                }
            }
            else
            {
                $d1 = "INSERT INTO turfbooking(TURF_ID,USER_ID,DATE,START_TIME,END_TIME)
                       VALUES('$tid','$uid','$dt','$st','$et')";
                $d2 = mysqli_query($conn,$d1);                                                      //ACTUAL BOOKING
            }
        }
        else
        {
            echo"<script>alert('Wrong Date!')</script>";
            echo "<script>window.history.back()</script>";
        }
        //echo "$dt" . "$st" . "$et" . "$uem" . "$tid", "$cdt", "$uid";
    }
?>
    
    <body>
            <center>
                <form class="#" action="checkout.php" method="post">
                    PAYMENT FORM
                    <input type="submit" value="Book" name="finalbook">
                </form>
            </center>
    </body>
    <br><br><br><br><br>
    <?php
       // include("footer.php");
    ?>
</html>         