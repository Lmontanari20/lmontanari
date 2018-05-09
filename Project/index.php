<?php
    include 'header.html';
    include '../dbConn.php';
    session_start();
    $conn = getDatabaseConnection("games");
    
    
    function getAllPets() {
        global $conn;
        $sql = "SELECT * FROM ps4, xbox, switch";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    
    function displaySearchResults() {
    global $conn;
    
       if (isset($_GET['search'])) { 
            
            echo "<h3>Products Found: </h3>"; 
            
            
            $namedParameters = array();
        
            $sql = "SELECT * FROM xbox WHERE 1";
            
            if(!empty($_GET['console'])){
                $sql .= " AND console LIKE '%".$_GET['console']."%'";
                
                
            }
            
            if(!empty($_GET['name'])){
                $sql .= " AND name LIKE '%".$_GET['name']."%'";
                
            }
            if(!empty($_GET['genre'])) {
                $sql.= " AND genre LIKE '%" .$_GET["genre"]."%' ";
                
            }
            if(!empty($_GET['sort'])) {
                $sql.= " ORDER BY price ";
                if($_GET["sort"] == "low") {
                    $sql.= " ASC ";
                }else {
                    $sql.= " DESC ";
                }
            }
            
             $stmt = $conn->prepare($sql);
             $stmt->execute();
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
             if(sizeof($records) == 0) {
                 echo "<h2 id='red'>Wrong Information provided... Try Again!</h2>";
             }
             echo "<table id='searchtable'>";
            foreach ($records as $record) {
                echo "<tr><td>";
                 echo "<img width='200' height='250' src='img/" .$record['url']. "'>";
                 echo "</td><td>";
                 echo  "<strong>Name</strong>: " . $record["name"] . "<br> <strong>Genre</strong>: " . $record["genre"] . "<br> <strong>Price</strong>:  " . $record['price']. "<br> <strong>Console</strong>: " . $record['console']. 
                 "<br> <strong>Year Released</strong>:  " . $record['yearReleased'] . "<br><strong> Rating</strong>:  " . $record['rating'] . "/5";
            }
            echo "</table>";
        }
        
}
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Video Game Finder </title>
        <style>
           h2 {color:red;}
           #searchtable {
               margin:auto;
           }
           td {
               text-align:left;
           }
        </style>
    </head>
    <body>
        
         <div>
            <form method="GET">
                Search Name: <input name="name" type="text"> 
                Genre: <select name="genre">
                            <option value="" >Select One</option>
                            <option value="action">Action</option>
                            <option value="adventure" >Adventure</option>
                            <option value="sports" >Sports</option>
                            <option value="shooter">Shooter</option>
                        </select>
                Console: <select name="console">
                            <option value="">Select One</option>
                            <option value="Xbox">Xbox</option>
                            <option value="ps4">PlayStation</option>
                            <option value="Switch">Nintendo Switch</option>
                        </select>
                        <br>
                Sort By: 
                        <input type="radio" name="sort" value="low"> Lowest Price
                        <input type="radio" name="sort" value="high"> Highest Price
                        <br><br>
                        <input type="submit" value="Search!" name="search">
            </form>
        </div>
        <div>
            <?php 
                displaySearchResults();
            ?>
        </div>
        
        
    </body>
</html>

<?php
    include 'footer.html';
?> 