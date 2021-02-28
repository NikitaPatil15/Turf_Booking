<!DOCTYPE html> 
<html>
    <head>
         <title> Turf Booking Website </title>
         <link href="css/style.css" rel="stylesheet">
    <?php
        include("header.php");
        if(isset($_POST['sub']))
        {
            echo"<script>window.open('book.php','_self')</script>";
        }
    ?>
    </head>
    
    <body>
        <div class="container" style="background-image:url('images/Turf1.jpg')">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="content">
                <h1>BOOK YOUR SLOTS NOW!</h1>
                <br>
                <p>Please arrive 15 min before the booking time at the ground.
                You can play during booked time frame only. Late comers will not get extension.
                Not more than 14 players will be allowed on the ground per booking.
                No external coaches, training sessions and parties will be permittted.
                For events and parties please contact us at (info@turfbook.com).
                Add/Book Your Slot or Call us at (9949774430) and we will book it for you! </p>
                <br><br>
                <form method="post" action="index.php">
                    <input type="submit" class="bookbtn" value="BOOK NOW" name="sub">
                </form>
            </div>
        </div>
    </body>
    <?php
        include("footer.php");
    ?>
</html>
