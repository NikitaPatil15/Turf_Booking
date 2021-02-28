<html>
    <head>
        <title>Turf Booking</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("header.php");
            include("connect.php");
        ?>
    </head>
    <br><br><br><br><br><br>
    <body>
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
                <th>BOOK</th>
                <th></th>              
            </tr>
            <?php
                $query = "SELECT * FROM turf";
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
                     $sp = $row['BOOK'];
                    
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $nm . "</td>";
                    echo "<td>" . $ad . "</td>";
                    echo "<td>" . $ct . "</td>";
                    echo "<td>" . $st . "</td>";
                    echo "<td>" . $stt . "</td>";
                    echo "<td>" . $edt . "</td>";
                    echo "<td>" . $sd . "</td>";
                    echo "<td>" . $sp . "</td>";
                    echo "<td>" . $Bk . "</td>";
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </body>
    <?php
        include("footer.php");
    ?>
</html>