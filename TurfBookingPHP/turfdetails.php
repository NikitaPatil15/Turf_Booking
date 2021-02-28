<! DOCTYPE html>
<html>
    <head>
        <title>Turf Booking</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("header.php");
            include("connect.php");
            session_start();
            if (isset($_SESSION['email']) && $_SESSION['loggedin'] == true) 
            {   
            } 
            else 
            {
                ?>
                <h1 class="notice">Please <a href="signin.php">log in or Sign up</a> to continue</h1>
                <?php
                die();
            }
        ?>
    </head>
    <br><br><br>
    <br><br><br>
    <center><label id="bk"><h1>CHECKOUT</h1></label></center>
    <br>
    <br>
    <body>
        <?php
            $id = $_GET['turf_id'];
            $_SESSION['turfid'] = $id;
        ?>
        <div id="turfdetails">
            <center>
            <table id="tb">
                <tr>
                    <th>TURF ID.</th> 
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>STATE</th>
                    <th>START TIME</th>
                    <th>END TIME</th>
                    <th>SIDES</th>
                    <th>SPORTS</th> 
                </tr>
                    <?php
                    $query = "SELECT * FROM turf WHERE TURF_ID='$id'";
                    $exe = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($exe))
                    {   
                        $id = $row['TURF_ID'];
                        $nm = $row['NAME'];
                        $ad = $row['ADDRESS'];
                        $ct = $row['CITY'];
                        $st = $row['STATE'];
                        $stt = $row['OPEN_TIME'];
                        $edt = $row['CLOSE_TIME'];
                        $sd = $row['SIDES'];
                        $sp = $row['SPORTS'];

                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $nm . "</td>";
                        echo "<td>" . $ad . "</td>";
                        echo "<td>" . $ct . "</td>";
                        echo "<td>" . $st . "</td>";
                        echo "<td>" . $stt . "</td>";
                        echo "<td>" . $edt . "</td>";
                        echo "<td>" . $sd . "</td>";
                        echo "<td>" . $sp . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            </center>
        </div>
        <br>
        <div>
            <center>
                CURRENT BOOKING DETAILS
            </center>
        </div>
        <br><br><br>
        <div id="bookdiv">
            <center>
                <form class="#" action="payment.php" method="post">
                    <label class="ld">SELECT DATE</label>
                        <input type="date" name="bdate" required>
                    <label class="st">START TIME</label>
                        <input type="time" name="stime" required>
                    <label class="et">END TIME</label>
                        <input type="time" name="etime" required>
                    <input type="submit" value="Proceed to Payment" name="pbtn" action="checkout.php">
                </form>
            </center>
        </div>
    </body>
    <br><br><br><br><br>
    <?php
        include("footer.php");
    ?>
</html>