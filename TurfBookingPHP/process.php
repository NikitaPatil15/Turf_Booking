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
            </tr>
            <?php
                $query = "SELECT * FROM turf";
                $exe = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($exe))
                {   
                    echo "<tr>";
                    echo "<td>" . $row['TURF_ID'] . "</td>";
                    echo "<td>" . $row['NAME'] . "</td>";
                    echo "<td>" . $row['ADDRESS'] . "</td>";
                    echo "<td>" . $row['CITY'] . "</td>";
                    echo "<td>" . $row['STATE'] . "</td>";
                    echo "<td>" . $row['START_TIME'] . "</td>";
                    echo "<td>" . $row['END_TIME'] . "</td>";
                    echo "<td>" . $row['SIDES'] . "</td>";
                    echo "<td>" . $row['SPORTS'] . "</td>";
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