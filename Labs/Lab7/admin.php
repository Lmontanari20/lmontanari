<?php
session_start();

if(!isset($_SESSION['adminName'])) {
    header("Location:index.php");
}

//connecting to the database
include "../../dbConn.php";
$conn = getDatabaseConnection("ottermart");

function displayAllProducts() {
    global $conn;
    $sql = "SELECT * FROM om_product";
    
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <body>


        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        
        <br />
        <form action="addProduct.php">
        <input type="submit" name="addProduct" value="Add Product"/>
        </form>
        <strong> Products: </strong> <br />
        
        
        <?php
        $records = displayAllProducts();
        foreach($records as $record) {
            echo "<a href='updateProduct.php?productId=".$record['productId']."'>Update</a>";
            echo $record['productName'];
            echo '<br />';
        }
        ?>
        
        

    </body>
</html>