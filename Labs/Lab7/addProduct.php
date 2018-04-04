<?php
    session_start();
    include "../../dbConn.php";
    $conn = getDatabaseConnection("ottermart");
    //makes sure user is logged in to access this page
    if(!isset($_SESSION['adminName'])) {
        header("Location:index.php");
    }
    
    function getCategories() {
        global $conn;
    
        $sql = "SELECT catId, catName FROM om_category GROUP BY ASC";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo "<option value='".$record[catId]."'>".$record[catName]."</option>";
        }
    }

    if(isset($_GET['submitProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productPrice = $_GET['price'];
        $productImage = $_GET['productImage'];
        $catId = $_GET['catId'];
    
        $sql ="INSERT INTO product (productName, productDescription, productImage, price, catId)
               VALUES (:productName, :productDescription, :productImage, :productPrice, :catId)";
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':productPrice'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <title> Add a product</title>
    </head>
    <body>
        <h1> Add a Product</h1>
        <form>
            Product name: <input type="text" name="productName"><br>
            Description: <textarea name="description" cols = 50 rows = 4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name="catId">
                      <option value="">Select One</option>
                      <?php getCategories(); ?>
                      </select> <br />
            Set Image Url: <input type = "text" name = "productImage"><br>
            <input type="submit" name="submitProduct" value="Add Product">
            
        </form>
    </body>
</html>