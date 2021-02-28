
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
        <title>Turfmaster</title>
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
        <table id="adtb">
            <tr>
                <th align="left">TURFMASTER</th>
                <th align="right">
                    <form id="add" method="post" action="turfmaster.php">
                        Enter Turf :
                        <input type="text" name="tname" required>
                        <input type="submit" value="ADD TURF" name="add">
                    </form>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <table id="tb">
                    <tr>
                        <th>SR NO.</th>
                        <th>TURF</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
                        if(isset($_POST['add']))
                        {
                            $tname = $_POST['tname'];
                            $addst =  "INSERT INTO turfname (TURFNAME)VALUES('$tname')";
                            $addst1 = mysqli_query($conn,$addst); 
                            if($addst1)
                            {
                                echo"<script>alert('TURF ADDED!!')</script>";
                                echo"<script>window.open('turfmaster.php','_self')</script>";
                            }else{
                                echo "query not executed!";
                                die(mysqli_error($conn));
                            }
                        }
                        $query = "SELECT * FROM turfname";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                            {
                                $tid = $row[0];
                                $turf = $row[1];
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $i;   
                            ?>
                        </td>
                        <td><?php echo $turf; ?></td>
                        <td>
                            <button class="del">
                                <a href='turfmaster.php?del=<?php echo $tid; ?>'>
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
                </table>
                </td>
            </tr>
        </table>
        </center>    
    </body>
</html>
<?php
    }   
?>
