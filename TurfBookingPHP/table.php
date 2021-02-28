<! DOCTYPE html>
<html>
    <head>
        <title>Turf Booking</title>
        <link href="css/style.css" rel="stylesheet">
        <?php
            include("book.php");
            if(isset($_POST['chk']))
            {
                echo"<script>window.open('checkout.php','_self')</script>";
            }
        ?>
    </head>
    <br><br><br>
    <body>
        <center>
        <table id="tb">
            <tr>
                <th>SR NO.</th>
                <th>CHECK</th>
                <th>NAME</th>
                <th>STATE</th>
                <th>CITY</th>
                <th>SLOTS</th>
                <th>SPORTS</th>
                <th>SIDES</th>
                <th>ADDRESS</th>
                <th>STATUS</th>
                <th>PRICE</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <form>
                        <input type="checkbox">
                    </form>
                </td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07.00 to 8.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjka</td>
                <td>Available</td>
                <td>3000</td>
            </tr>
             <tr>
                <td>1</td>
                <td>
                    <form>
                        <input type="checkbox">
                    </form>
                </td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07.00 to 8.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjka</td>
                <td>Available</td>
                <td>3000</td>   
            </tr>     
             <tr>
                <td>1</td>
                <td>
                    <form>
                        <input type="checkbox">
                    </form>
                </td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07.00 to 8.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjka</td>
                <td>Available</td>
                <td>3000</td>   
            </tr>     
        </table>
        </center>
        <br>
        <form method="post" action="table.php">
            <button type="button" class="total">TOTAL PRICE: 0/-</button>
            <button type="submit" class="chk" name="chk">CHECKOUT</button>
        </form>
    </body>
</html>