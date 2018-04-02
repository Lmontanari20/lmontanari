<?php 

include '../../dbConn.php';

$conn = getDatabaseConnection("ottermart");

 function displayCategories() {
        
        global $conn;
        
        $sql = "SELECT catId, catName FROM `om_category` ORDER BY catName";
        
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($records as $record) {
            
            echo "<option value='".$record["catId"]."'>" . $record['catName'] . "</option>";
            
        }
}


function displaySearchResults() {
    global $conn;
    //checks if user submits the form(clicks search)
       if (isset($_GET['searchForm'])) { //checks whether user has submitted the form
            
            echo "<h3>Products Found: </h3>"; 
            
            //following sql works but it DOES NOT prevent SQL Injection
            //$sql = "SELECT * FROM om_product WHERE 1
            //       AND productName LIKE '%".$_GET['product']."%'";
            
            //Query below prevents SQL Injection
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            if(!empty($_GET['product'])){
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
                
            }
            if(!empty($_GET['priceFrom'])) {
                $sql.= " AND price >= :priceFrom ";
                $namedParameters[":priceFrom"] = $_GET["priceFrom"];
            }
            if(!empty($_GET['priceTo'])) {
                $sql.= " AND price <= :priceTo ";
                $namedParameters[":priceTo"] = $_GET["priceTo"];
            }
            if(!empty($_GET['category'])){
                $sql .= " AND catId = :categId";
                $namedParameters[":categId"] = $_GET['category'];
                
            }
            
            if(isset($_GET['orderBy'])) {
                
                if($_GET['orderBy'] == 'price') {
                    
                    $sql .= " ORDER BY price"; 
                    
                }else {
                    
                    $sql .= " ORDER BY productName";
                    
                }
            }
            
            
             $stmt = $conn->prepare($sql);
             $stmt->execute($namedParameters);
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($records as $record) {
            
                 echo "<a href=\"purchaseHistory.php?productId=".$record['productId']."\"> History </a>";
                 echo  $record["productName"] . " " . $record["productDescription"] . " " . $record['price'] . "<br /> <br />";
            
            }
        }
        
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>OtterMart Search </title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8";
    </head>
    <body>
        
        <h1> OtterMart Product Search </h1>
        
        <form id="form">
            
            Product: <input type="text" name="product" /> <br />
            
            Category: 
                <select name="category">
                    <option value=""> Select One</option>
                    <?=displayCategories()?>
                </select>
                <br />
            
            Price: <br /> From <input type="text" name="priceFrom"/><br />
                    To  <input type="text" name="priceTo"/>
                <br />
                
            Order result by:
            
            <br />
            <input type="radio" name="orderBy" value="price" size="7"/> Price<br />
            <input type="radio" name="orderBy" value="name" size="7"/> Name<br />
            
            <br />
            
            <input type="submit" name="searchForm" value="Search" />
            
        </form>
        
        <br />
        <hr>
        
        <?=displaySearchResults() ?>
        
    </body>
</html>