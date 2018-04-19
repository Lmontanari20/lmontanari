<?php

    session_start();

    if(!isset($_SESSION['adminName'])) {
        header("Location:index.php");
    }
    //echo $_GET['productId'];
    
    include '../../dbConn.php';
    
    $conn = getDatabaseConnection('ottermart');
    
    function getProductInfo() {
        global $conn;
        
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'] ;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    function getCategories($catid) {
        global $conn;
    
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($records as $record) {
            echo "<option ";
            echo ($record['catId'] == $catid)? "selected ":""; 
            echo " value='".$record['catId']."'>".$record['catName']."</option>";
            
            
        }
    }
    
    if(isset($_GET['productId'])) {
        $product = getProductInfo();
    }
        
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>
    </head>
    <body>
        <h1>Update Product</h1>
        <form>
            Product name: <input type="text" name="productName" value="<?=$product['productName']?>"><br>
            Description: <textarea name="description" cols = 50 rows = 4 value="<?=$product['description']?>"></textarea><br>
            Price: <input type="text" name="price" value="<?=$product['price']?>"><br>
            Category: <select name="catId">
                      <option value="">Select One</option>
                      <?php getCategories($product['catId']); ?>
                      </select> <br />
            
            Set Image Url: <input type = "text" name = "productImage" value="<?=$product['productImage']?>"><br>
            <input type="submit" name="updateProduct" value="Update Product">          
            
        </form>
    </body>
</html>