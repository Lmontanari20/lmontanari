<?php

include '../../dbConn.php';

$conn = getDatabaseConnection("ottermart");

$productId = $_GET['productId'];


    
    $sql = "SELECT * 
            FROM om_product NATURAL JOIN om_purchase 
            WHERE productId = :pId";
            
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $records[0]['productName'] . "<br>";
    
    
    foreach ($records as $record) {
        echo "<img src='" . $records['productImage'] . "' /><br />";
        echo $record['productName'] . "<br>";
        echo "Purchase Date: " . $record["purchaseDate"] ."<br />";
        echo "Unit Price: " . $record["unitPrice"] ."<br />";
        echo "Quantity: " . $record["quantity"] ."<br />";
    }
    



?>




<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
    </body>
</html>