
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
        $del1 = "DELETE FROM state WHERE ID='$delid'";
        $del2 = mysqli_query($conn,$del1);
        echo"<script>window.open('statemaster.php','_self')</script>";
    }
?>
<!doctype html>
<html>
    <head>
        <title>Statemaster</title>
        <li0nk href="css/style.css" rel="stylesheet">
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
                <th align="left">STATEMASTER</th>
                <th align="right">
                    <form id="add" method="post" action="statemaster.php">
                        Enter State :
                        <input type="text" name="stname" required>
                        <input type="submit" value="ADD STATE" name="add">
                    </form>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <table id="tb">
                    <tr>
                        <th>SR NO.</th>
                        <th>STATE</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
                        if(isset($_POST['add']))
                        {
                            $stname = $_POST['stname'];
                            $addst =  "INSERT INTO state (STATE)VALUES('$stname')";
                            $addst1 = mysqli_query($conn,$addst); 
                            if($addst1)
                            {
                                echo"<script>alert('STATE ADDED!!')</script>";
                                echo"<script>window.open('statemaster.php','_self')</script>";
                            }else{
                                echo "query not executed!";
                                die(mysqli_error($conn));
                            }
                        }
                        $query = "SELECT * FROM state";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                            {
                                $stid = $row[0];
                                $state = $row[1];
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $i;   
                            ?>
                        </td>
                        <td><?php echo $state; ?></td>
                        <td>
                            <button class="del">
                                <a href='statemaster.php?del=<?php echo $stid; ?>'>
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
