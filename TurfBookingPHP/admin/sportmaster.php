<!doctype html>
<html>
    <head>
        <title>Sportmaster</title>
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
                <th align="left">SPORTMASTER</th>
                <th align="right">
                    <form id="add">
                        <input type="submit" value="ADD SPORT">
                    </form>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                <table id="tb">
                    <tr>
                        <th>SR NO.</th>
                        <th>SPORTS</th>
                        <th>DELETE</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Cricket</td>
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
                        <td>2</td>
                        <td>Football</td>
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
                </td>
            </tr>
        </table>
        </center>    
    </body>
</html>