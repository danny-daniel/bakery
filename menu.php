<?php

    include '../../includes/dbConnections.php';

    session_start();
    
    $dbConn = getDatabaseConnection('bakery');
    
    function getPanDulce()
    {
        global $dbConn;
        
        $sql = "SELECT * FROM
            Bread ORDER BY bread";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $pan = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table>";
        
        foreach ($pan as $bread)
        {
            echo "<tr><td><input type='checkbox' name='cart[]'></td>";
            echo "<td>" .$bread['bread']. "</td> <td>" .$bread['price']. "</td><td><img src='img/bread/".$bread['bread'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
    }
    function getPastries()
    {
        
        global $dbConn;
        
        $sql = "SELECT * 
                FROM pastries
                ORDER BY name";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table>";
        
        foreach ($records as $record)
        {
            echo "<tr><td><input type='checkbox' name='cart[]'></td>";
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/pastries/" .$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
        
    }
    
     function getDrinks()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM drinks
                ORDER BY name";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table>";
        
        foreach ($records as $record)
        {
            echo "<tr><td><input type='checkbox' name='cart[]'></td>";
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/drinks/" .$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
    }
    function getSandwich()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM sandwich
                ORDER BY name";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table>";
        
        foreach ($records as $record)
        {
            echo "<tr><td><input type='checkbox' name='cart[]'></td>";
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/sandwiches/" .$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
    }
    
        function getVegetarian()
    {
        global $dbConn;
        
        $sql = "SELECT * 
                FROM vegetarian
                ORDER BY name";
            
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<form>";
        echo "<table>";
        
        foreach ($records as $record)
        {
            echo "<tr><td><input type='checkbox' name='cart[]'></td>";
            echo "<td>" .$record['name']. "</td><td>" .$record['price']. "</td><td><img src='img/Vegetarian/" .$record['name'].".jpg'/></td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
    }
    function addToCart(){
        if(isset($_GET['addCart'])){
            header("Location: shoppingCart.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Menu </title>
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
       
        
    <nav>
       <a href="menu.php"  >Menu </a>
       &emsp;
       <a href="location.php" > Location </a>
       &emsp;
       <a href="aboutUs.php" > About Us </a>
       
    
    
        <form>
            <h2> Please choose from our wide selection: <select name="option"> </h2>
                <option>Choose one</option>
                <option>Pan Dulce</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
            </select>
            
            <input type='submit' name='submitRequest' value="Get Foods">
            <input type='submit' name = "addCart" value ="Submit">
            
        </form>
        
        </nav>
        
        <?php
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Pan Dulce")
                getPanDulce();
            
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Pastries")
                getPastries();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Drinks")
                getDrinks();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Sandwiches")
                getSandwich();
                
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Vegetarian")
                getVegetarian();
            if(isset($_GET['addCart']))
                addToCart();
        ?>
    </body>
</html>