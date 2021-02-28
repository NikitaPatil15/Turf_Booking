<!doctype html>
<?php
    session_start();
    include("connect.php");
?>
        <div class="header">
            <div id="title">
                <a href="index.php">TURF BOOKING</a>
            </div>
            <div id="menu">
                <ul>
                    <?php
                    if(!@$_SESSION['email'])
                    {
                    ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="book.php">BOOK TURF</a></li>
                    <li><a href="ourservices.php">OUR SERVICES</a></li>
                    <li><a href="contactus.php">CONTACT</a></li>
                    <li><a href="signin.php">SIGN IN/SIGN UP</a></li>
                    <?php
                    }else
                    {
                    ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="book.php">BOOK TURF</a></li>
                    <li><a href="#">OUR SERVICES</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>