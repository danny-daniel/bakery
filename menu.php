<?php
    include("../includes/dbConnection.php");
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
            echo "<td>" .$bread['bread']. "</td> <td>" .$bread['price']. "</td></tr>";
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
            echo "<td>" .$record['name']. "</td> <td>" .$record['price']. "</td></tr>";
        }
        
        echo "</table>";
        echo "</form>";
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
       
        <form>
            Please choose from our wide selection: <select name="option">
                <option>Choose one</option>
                <option>Pan Dulce</option>
                <option>Drinks</option>
                <option>Pastries</option>
                <option>Sandwiches</option>
                <option>Vegetarian</option>
            </select>
            
            <input type='submit' name='submitRequest' value="Get Foods">
            
        </form>
        
        <?php
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Pan Dulce")
                getPanDulce();
            
            if (isset($_GET['submitRequest']) && $_GET['option'] == "Pastries")
                getPastries();
        ?>
    </body>
</html>