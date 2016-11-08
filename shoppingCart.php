<?php
session_start();
print_r($_GET['cartt']);

 if (!isset($_SESSION['cartt'])) {
     $_SESSION['cartt'] = array();  //initializing session variable
  }
  
    $cart = $_GET['cartt'];
    
    // foreach($cart as $element )
    // {   
    //     if (!in_array($element, $SESSION['cartt'])) { 
    //   $_SESSION['cartt'][] = $element;
    //     }
    //       echo $element . "<br/>";
    // }

    echo "Your items: <br/>";
    
    foreach($_SESSION['cartt'] as $element ) {
        echo $element . "<br/>";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your Cart</title>
    </head>

<br />
<form>
<input type="submit" value="Check Out" />
</form>
</html>