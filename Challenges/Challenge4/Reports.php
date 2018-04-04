<?php

// Write  SQL SELECT statements to generate the following reports:

// 1) How many users bought something in February?
$sql1 = "SELECT COUNT(1) 
            FROM om_purchase 
            WHERE purchaseDate >= \"2018-02-01\" AND purchaseDate <= \"2018-02-28\" 
            ";
            
// 2) What products were bought by users who have an aol account?
 $sql2 = "SELECT productName
            FROM om_user u
            INNER JOIN om_purchase p
            on u.userId = p.user_id
            NATURAL JOIN om_product
            WHERE email LIKE \"%@aol.com\" ";
            
// 3) What is the total quantity of products bought by male and female users?
$sql3 = "SELECT sex, sum(quantity) 
            FROM om_user 
            LEFT JOIN om_purchase
            ON user.userId = purchase.user_id
            GROUP by sex";
            
// 4) What product categories were bought in February? (eg. Books, Sports)
$sql4 = "SELECT catName 
            FROM `category` 
            NATURAL JOIN product pro 
            NATURAL JOIN purchase pur 
            WHERE purchaseDate BETWEEN \"2018-02-01\" AND \"2018-02-28\" 
            GROUP BY catName 
            ";

$host = "localhost";
$dbname = "ottermart";
$username = "root";
$password = "";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $dbConn->prepare($sql1);
$stmt->execute();
$records = $stmt->fetch();


echo "Total Purchases in February: " . $records['totalPurchases'];
 
 
$stmt = $dbConn->prepare($sql2);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);  //You are expecting MANY records
 
//print_r($records);
 
echo "<br/><br/>Products bought by users with an AOL account: <br />";
 
foreach ($records as $record) {
  
    echo $record['productName']  . "<br />";
   
}

$stmt = $dbConn->prepare($sql3);
$stmt->execute();
$records = $stmt->fetch();

echo " The total quantity of products bought by male and female: <br /> "

    
echo $record['sex'];
echo $record['quantity'];
 
?>

