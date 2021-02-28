<! DOCTYPE html>
<html>
    <head>
        <title>Turf Booking</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("header.php");
            include("connect.php");
            session_start();
            $a0="1";
            $tp="0";
            if(isset($_GET['del']))
    {
        $delid = $_GET['del'];
        $del1 = "DELETE FROM turfname WHERE ID='delid'";
        $del2 = mysqli_query($conn,$del1);
        echo"<script>window.open('checkout.php','_self')</script>";
    }
        ?>
    </head>
    <br><br><br>
    <br><br><br>
    <center><label id="bk"><h1>CHECKOUT</h1></label></center>
    <br>
    <br>




    <?php
    
    if(isset($_POST['finalbook']))
    {
      $tid = $_SESSION['turfid'];
     
        $cdt = date("Y-m-d");
       $sql="SELECT DATE FROM turfbooking WHERE TURF_ID='$tid'"   ;
       $q1=mysqli_query($conn,$sql);
       $dt=$q1;

        if($dt > $cdt)        
        {

            //echo "advance payment";
            $sql3="SELECT ADVANCE_PAYMENT FROM turf WHERE TURF_ID='$tid'" ;
             $q4=mysqli_query($conn,$sql3);
             while($row = mysqli_fetch_assoc($q4))
                        {
                            $q5 = $row['ADVANCE_PAYMENT'];
                            }
                            $b1= "UPDATE turfbooking 
                            SET TOTAL_PRICE='$q5' 
                            WHERE TURF_ID='$tid'"; 
                            
                            
                            $b2=mysqli_query($conn,$b1);
                        
             
             //echo $q4;
        }

            else{

            $sql1="SELECT START_TIME FROM turfbooking WHERE TURF_ID='$tid'"   ;
            $q2=mysqli_query($conn,$sql1);
            $st=$q2;

            $sql2="SELECT OPEN_TIME FROM turf WHERE TURF_ID = '$tid'";
            $q3=mysqli_query($conn,$sql2);
            $ot=$q3;

            if($q2 > $q3){
               // echo "normal payment";
            $sql4="SELECT NORMAL_PAYMENT FROM turf WHERE TURF_ID='$tid'" ;
             $q6=mysqli_query($conn,$sql4);
             while($row = mysqli_fetch_assoc($q6))
                        {
                            $q7 = $row['NORMAL_PAYMENT'];
                            
                        }
                        $b3= "UPDATE turfbooking 
                            SET TOTAL_PRICE='$q7' 
                            WHERE TURF_ID='$tid'";
                        $b4=mysqli_query($conn,$b3);
           
            }

            else{
                //echo "peak hour payment";
                 $sql5="SELECT PEAKHOUR_PAYMENT FROM turf WHERE TURF_ID='$tid'" ;
             $q8=mysqli_query($conn,$sql5);
             while($row = mysqli_fetch_assoc($q8))
                        {
                            $q9 = $row['PEAKHOUR_PAYMENT'];
                            
                        }
                        $b5= "UPDATE turfbooking 
                            SET TOTAL_PRICE='$q9' 
                            WHERE TURF_ID='$tid'";
                        $b6=mysqli_query($conn,$b5);
           
            }
        }
}       
            ?>
            <center>
        <table id="tb">
            <tr>
                <th>SR.NO</th>
                <th>STATE</th>
                <th>CITY</th>
                <th>SPORTS</th>
                <th>SIDES</th>
                <th>ADDRESS</th>
                <th>DATE</th>
                <th>START TIME</th>
                <th>END TIME</th>
                <th>TOTAL PRICE</th>
                <th>DELETE</th>
            </tr>
        
<?php
             $u_eamil = $_SESSION['email'];
             $uid1 = "SELECT USER_ID from meminfo where EMAIL='$u_eamil'";
             $uid2 = mysqli_query($conn,$uid1);
             $uid3 = mysqli_fetch_assoc($uid2);
             $uid = $uid3['USER_ID'];
             //echo $uid;
                        $chk2="SELECT * FROM turfbooking WHERE USER_ID = '$uid'";
                            $result1 = mysqli_query($conn,$chk2);  
                            
                       // echo mysqli_num_rows($result1); 
                        while($row1 = mysqli_fetch_assoc($result1))
                        {
                            $a7 = $row1['DATE'];
                            $a8 = $row1['START_TIME'];
                            $a9 = $row1['END_TIME'];
                            $a10 = $row1['TOTAL_PRICE'];
                            $a12 = $row1['USER_ID'];

                            $a11 = $row1['TURF_ID'];
                            $chk1 = "SELECT * FROM turf WHERE TURF_ID = '$a11'";
                            $result = mysqli_query($conn,$chk1);
                            $row = mysqli_fetch_assoc($result);
                           
                            //$a1 = $row['NAME'];
                            $a2 = $row['STATE'];
                            $a3 = $row['CITY'];
                            $a4 = $row['SPORTS'];
                            $a5 = $row['SIDES'];
                            $a6 = $row['ADDRESS'];
                                           
    ?>

    
    
            
            <tr>
            <td><?php echo $a0; ?></td>
            <td><?php echo $a2; ?></td>
            <td><?php echo $a3; ?></td>
            <td><?php echo $a4; ?></td>
            <td><?php echo $a5; ?></td>
            <td><?php echo $a6; ?></td>
            <td><?php echo $a7; ?></td>
            <td><?php echo $a8; ?></td>
            <td><?php echo $a9; ?></td>
            <td><?php echo $a10; ?></td>

            <td>
                <form>
                    <button type="button">
                        <div class="d">
                        <a href='checkout.php?del=<?php echo $tid; ?>'>
                            <img src=images/images.png alt="d">
                        </div>
                    </button>
                </form>

            </td>
            </tr>
                        
             <?php 
                $a0++;
                $tp=$tp+$a10;
            }
            
            ?>
            </table>
            <button id="k" >Total Price: <?php echo $tp; ?>/-</button></td>
            <button id="t" >BOOK THE TURF/-</button></td>
</html>