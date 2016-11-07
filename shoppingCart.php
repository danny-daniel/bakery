<?php
session_start();
print_r($_SESSION['cart']);


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Shopping Cart </title>
        <link rel="stylesheet" href="css/project1.css" type="text/css" />
    </head>
    <body>
        <nav>
           <a href="menu.php"  >Menu </a>
           &emsp;
           <a href="location.php" > Location </a>
           &emsp;
           <a href="aboutUs.php" > About Us </a>
       
       </nav>
    </body>
</html>