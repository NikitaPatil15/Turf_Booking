
<?php
    session_start();
    if(!$_SESSION['username'])
    {
       header("location: index.php");
    }
    else
    {
    include("connect.php");
    $i = "1";
    if(isset($_GET['del']))
    {
        $delid = $_GET['del'];
        $del1 = "DELETE FROM turfname WHERE ID='delid'";
        $del2 = mysqli_query($conn,$del1);
        echo"<script>window.open('turfmaster.php','_self')</script>";
    }
?>
<!doctype html>
<html>
    <head>
        <title>Slots Booked</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("header.php");
        ?>
    </head>
    <br>
    <br>
    <br>
    <br>
    <body>
        <center>
                
                <table id="tb">
                    <td colspan="11">
                    <tr>
                        <th>SR NO.</th>
                        <th>TURF DETAILS</th>
                        <th>SPORTS</th>
                        <th>SIDES</th>
                        <th>START TIME</th>
                        <th>END TIME</th>
                        <th>BOOKED PRICE</th>
                        <th>BOOKED DATE</th>
                        <th>USER</th>
                        <th>BOOKING DATE</th>
                        <th>DELETE</th>
                    </tr>
                    </td>


                    <?php
                    $c1="SELECT * FROM turfbooking";
                    $c2 = mysqli_query($conn,$c1);
                    while($row1=mysqli_fetch_assoc($c2)){
                            $a7 = $row1['DATE'];
                            $a8 = $row1['START_TIME'];
                            $a9 = $row1['END_TIME'];
                            $a10 = $row1['TOTAL_PRICE'];
                            $a12 = $row1['USER_ID'];
                            $a13 = $row1['BOOKING_DATE'];

                            $a11 = $row1['TURF_ID'];
                            $chk1 = "SELECT * FROM turf WHERE TURF_ID = '$a11'";
                            $result = mysqli_query($conn,$chk1);
                            $row = mysqli_fetch_assoc($result);
                           
                            $a1 = $row['NAME'];
                            $a2 = $row['STATE'];
                            $a3 = $row['CITY'];
                            $a4 = $row['SPORTS'];
                            $a5 = $row['SIDES'];
                            $a6 = $row['ADDRESS'];


                    
                    ?>

            <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $a1; ?></td>
            <td><?php echo $a4; ?></td>
            <td><?php echo $a5; ?></td>
            <td><?php echo $a8; ?></td>
            <td><?php echo $a9; ?></td>
            <td><?php echo $a10; ?></td>
            <td><?php echo $a7; ?></td>
            <td><?php echo $a12; ?></td>
            <td><?php echo $a13; ?></td>
            
                        <td>
                            <button class="del">
                                <a href='slots.php?del=<?php echo $tid; ?>'>
                                    <div class="d">
                                        <img src=images/images.png alt="d">
                                    </div>
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                    </td>
                </table>
                
            
        </center>    
    </body>
</html>
<?php
    }   
?>
