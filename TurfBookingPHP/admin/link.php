<!doctype html>
<html>
    <head>
        <title>Link</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <?php
        include("header.php");
    ?>
    <br>
    <br>
    <br>
    <br>
    <body>
        <center>
        <form class="form1">
            SELECT STATE:
            <select>
                <option value="0">Select state</option>
            </select>
            <br>
            <br>
            SELECT CITY:
            <select>
                <option value="0">Select city</option>
            </select>
            <br>
            <br>
            SELECT SPORTS:
            <select>
                <option value="0">Select sports</option>
            </select>
            <br>
            <br>
            SELECT SIDES:
            <select>
                <option value="0">Select sides</option>
            </select>
            <br>
            <br>
            SELECT TURF:
            <select>
                <option value="0">Select turf</option>
            </select>
            <br>
            <br>
            ENTER START TIME:
            <input type="text">
            <br>
            <br>
            ENTER END TIME:
            <input type="text">
            <br>
            <br>
            ENTER SLOT TIME:
            <input type="text">
            <br>
            <br>
            ENTER ADDRESS:
            <input type="text">
            <br>
            <br>
            PRICE BEFORE PEAK:
            <input type="text">
             <br>
            <br>
            PRICE AFTER PEAK:
            <input type="text">
            <br>
            <br>
            <input type="submit" value="ADD">
        </form>
        <form class="form2">
            <table id="tab">
            <tr>
                <th>SR NO.</th>
                <th>NAME</th>
                <th>STATE</th>
                <th>CITY</th>
                <th>START TIME</th>
                <th>END TIME</th>
                <th>SLOTS</th>
                <th>SPORTS</th>
                <th>SIDES</th>
                <th>ADDRESS</th>
                <th>PRICE BEF. PEAK</th>
                <th>PRICE AFT. PEAK</th>
                <th>DELETE</th>
            </tr>
            <tr>
                <td>1</td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07:00</td>
                <td>21:00</td>
                <td>07.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjkafs</td>
                <td>3000</td>
                <td>4000</td>
                <td>
                    <form>
                        <button type="button">
                        <div class="d">
                            <img src=images/images.png alt="d">
                        </div></button>
                    </form>
                </td>
            </tr>
             <tr>
                <td>1</td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07:00</td>
                <td>21:00</td>
                <td>07.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjkafs</td>
                <td>3000</td>
                <td>4000</td>
                <td>
                    <form>
                        <button type="button">
                        <div class="d">
                            <img src=images/images.png alt="d">
                        </div></button>
                    </form>
                </td>
            </tr>
             <tr>
                <td>1</td>
                <td>turf1</td>
                <td>Maharshtra</td>
                <td>Mumbai</td>
                <td>07:00</td>
                <td>21:00</td>
                <td>07.00</td>
                <td>Cricket</td>
                <td>5A</td>
                <td>dsjafkdjkafs</td>
                <td>3000</td>
                <td>4000</td>
                <td>
                    <form>
                        <button type="button">
                        <div class="d">
                            <img src=images/images.png alt="d">
                        </div></button>
                    </form>
                </td>
            </tr>
        </table>
        </form>
        </center>
    </body>
</html>