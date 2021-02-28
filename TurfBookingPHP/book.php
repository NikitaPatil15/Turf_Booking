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
    <br><br><br><br><br><br>
    <body>
        <center><label id="bk"><h1>BOOK YOUR TURF</h1></label></center>
        <br><br><br>
        <form class="form1" action="book.php" method="post">
            <label class="l1">SELECT STATE</label>
            <select class="turf" name="state" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="Delhi">Delhi</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Goa">Goa</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            <label class="l2">SELECT CITY</label>
            <select class="turf" name="city" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="Mumbai">Mumbai</option>
                <option value="Thane">Thane</option>
                <option value="Pune">Pune</option>
            </select>
            <label class="l3">SELECT SIDES</label>
            <select class="turf" name="sides" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="3A">3A</option>
                <option value="3AAA">3AAA</option>
                <option value="5A">5A</option>
            </select>       
            <br><br>
            <input type="submit" class="gobtn" value="GO" name="go">
        </form>
        <a href="turflist.php"><button class="showall">SHOW ALL</button></a>
        <br>
        <br>
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
                if(isset($_POST['go']))
                {
                    $st = $_POST['state'];
                    $ct = $_POST['city'];
                    $sd = $_POST['sides'];
                    $query = "SELECT * FROM turf WHERE STATE='$st' && CITY = '$ct' && SIDES='$sd'";
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
                        ?>
                        <td>
                            <a href="turfdetails.php?turf_id=<?php echo $id ?>">
                                <button class="btn1">BOOK</button>
                            </a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
              ?>
            </table>
        </center>
        <?php
                }
        ?>       
    </body>
    <br><br><br><br><br>
    <?php
        include("footer.php");
    ?>
</html>