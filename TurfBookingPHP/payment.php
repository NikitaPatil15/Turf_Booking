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
    $uem = $_SESSION['email'];
    $cdt = date("Y-m-d");
    $sql = "SELECT USER_ID FROM meminfo WHERE EMAIL = '$uem'";
    $result = mysqli_query($conn,$sql);
    while ($row = $result->fetch_assoc()) 
    {
        $uid = $row['USER_ID'];
    }
    echo "UserID = " . $uid . "<br>";
    
    if(isset($_POST['pbtn']))
    {
        $dt = $_POST['bdate'];
        echo "dt = " . $dt . "<br>";
        $st = $_POST['stime'];
        echo "st = " . $st . "<br>";
        $et = $_POST['etime'];
        echo "et = " . $et . "<br>";
        $tid = $_SESSION['turfid'];
        if($st < $et)
        {
            if($dt > $cdt)        //Check if date is in Present
            {
                echo "Correct date<br>";
                $chk1 = "SELECT TURF_ID FROM turfbooking WHERE TURF_ID = '$tid'";
                $chk2 = mysqli_query($conn,$chk1);
                $chk3 = mysqli_num_rows($chk2);
                echo "chk3 = " . $chk3 . "<br>";
                if($chk3!="0")                          //Check wheather turf is already booked if yes, then check if timings clash
                {   
                    $chk7 = "SELECT OPEN_TIME FROM turf WHERE TURF_ID = '$tid'";
                    $result = mysqli_query($conn,$chk7);    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $q4 = $row['OPEN_TIME'];        //Turf Opening Time
                    }
                    echo "q4 = " . $q4 . "<br>";

                    $chk8 = "SELECT CLOSE_TIME FROM turf WHERE TURF_ID = '$tid'";
                    $result = mysqli_query($conn,$chk8);    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $q5 = $row['CLOSE_TIME'];       //Turf Closing Time
                    }
                    echo "q5 = " . $q5 . "<br>";

                    if($st>$q4 && $et<$q5)
                    {
                        $chk4 = "SELECT DATE FROM turfbooking WHERE TURF_ID = '$tid'";
                        $result = mysqli_query($conn,$chk4);    //Booked turf date
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $q1 = $row['DATE'];
                        }

                        $chk5 = "SELECT START_TIME FROM turfbooking WHERE TURF_ID = '$tid'";
                        $result = mysqli_query($conn,$chk5);    //Booked Turf Start Time
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $q2 = $row['START_TIME'];
                        }

                        $chk6 = "SELECT END_TIME FROM turfbooking WHERE TURF_ID = '$tid'";
                        $result = mysqli_query($conn,$chk6);    //Booked Turf End Time
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $q3 = $row['END_TIME'];
                        }

                        echo "q1 = " . "$q1". "<br>" . "q2 = " . "$q2". "<br>" . "q3 = " . "$q3". "<br>";
                        if($dt==$q1 && (($st>$q3 && $et<$q5) || ($st>$q4 && $et<$q2))) //Check date as well as timings , date can be the same
                        {
                            $d1 = "INSERT INTO turfbooking(TURF_ID,USER_ID,DATE,START_TIME,END_TIME)        
                                   VALUES('$tid','$uid','$dt','$st','$et')";
                            $d2 = mysqli_query($conn,$d1);
                            echo"<script>alert('Booking Successful!')</script>";
                            echo"<script>window.open('confirmbook.php','_self')</script>";        //ACTUAL BOOKING

                        }
                        elseif($dt>$q1 && $st>$q4 && $et<$q5)  //If date is different
                            {
                                $d1 = "INSERT INTO turfbooking(TURF_ID,USER_ID,DATE,START_TIME,END_TIME)        
                                       VALUES('$tid','$uid','$dt','$st','$et')";
                                $d2 = mysqli_query($conn,$d1);                                                  //ACTUAL BOOKING
                                echo"<script>alert('Booking Successful!')</script>";
                                echo"<script>window.open('confirmbook.php','_self')</script>";
                            }
                        else
                        {
                            echo"<script>alert('Slot Unavailable, Check date/time')</script>";
                            echo "<script>window.history.back()</script>";
                        }
                    }
                    else
                    {
                        echo"<script>alert('Turf not available at given time')</script>";
                        echo "<script>window.history.back()</script>";
                    }
                }
                else
                {  
                    $d1 = "INSERT INTO turfbooking(TURF_ID,USER_ID,DATE,START_TIME,END_TIME)
                           VALUES('$tid','$uid','$dt','$st','$et')";
                    $d2 = mysqli_query($conn,$d1);    
                    echo"<script>alert('Booking Successful!')</script>";
                    echo"<script>window.open('confirmbook.php','_self')</script>";        //ACTUAL BOOKING
                }
            }
            else
            {
                echo"<script>alert('Wrong Date!')</script>";
                echo "<script>window.history.back()</script>";
            }
        }
        else
        {
            echo"<script>alert('Start Time Cannot be Greater than End time!')</script>";
            echo "<script>window.history.back()</script>";
        }
        //echo "$dt" . "$st" . "$et" . "$uem" . "$tid", "$cdt", "$uid";
    }
?>
    
   
    <?php
       // include("footer.php");
    ?>
</html>