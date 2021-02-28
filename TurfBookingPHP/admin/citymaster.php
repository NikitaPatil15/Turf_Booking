
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
        $del1 = "DELETE FROM city WHERE ID='$delid'";
        $del2 = mysqli_query($conn,$del1);
        echo"<script>window.open('citymaster.php','_self')</script>";
    }
?>
<!doctype html>
<html>
    <head>
        <title>Citymaster</title>
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
                <th align="left">CITYMASTER</th>
                <th align="right">
                    <form id="add" method="post" action="citymaster.php">
                        Enter City :
                        <input type="text" name="ctname" required>
                        <input type="submit" value="ADD CITY" name="add">
                    </form>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <table id="tb">
                    <tr>
                        <th>SR NO.</th>
                        <th>CITY</th>
                        <th>DELETE</th>
                    </tr>
                    <?php
                        if(isset($_POST['add']))
                        {
                            $ctname = $_POST['ctname'];
                            $addct =  "INSERT INTO city (CITY) VALUES ('$ctname')";
                            $addct1 = mysqli_query($conn,$addct); 
                            if($addct1)
                            {
                                echo"<script>alert('CITY ADDED!!')</script>";
                                echo"<script>window.open('citymaster.php','_self')</script>";
                            }else{
                                echo "query not executed!";
                                die(mysqli_error($conn));
                            }
                        }
                        $query = "SELECT * FROM city";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result))
                            {
                                $ctid = $row[0];
                                $city = $row[1];
                    ?>
                    <tr>
                        <td>
                            <?php
                                echo $i;   
                            ?>
                        </td>
                        <td><?php echo $city; ?></td>
                        <td>
                            <button class="del">
                                <a href='citymaster.php?del=<?php echo $ctid; ?>'>
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