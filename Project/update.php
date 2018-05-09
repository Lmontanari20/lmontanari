<?php
    session_start();
    include 'header.html';
    include '../dbConn.php';
    $conn = getDatabaseConnection("games");
    

    if(!$_SESSION['user']) {
        header("Location:index.php");
    }
    
    function getAllGames() {
        global $conn;
        $sql = "SELECT * FROM xbox";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
    
    function deleteGame() 
    {
        global $conn;
        $sql = "DELETE FROM xbox WHERE xbox.name = '" . $_GET['delete']."'";
       
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    }
    
    // function avgPrice() {
    //     global $conn;
    //     $sql = "SELECT AVG(price) AS avg FROM xbox";
       
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
    //     echo "<h6> Average Price: $" . number_format($record['avg'], 2)."</h6>";
    // }
    
    // function minPrice() {
    //     global $conn;
    //     $sql = "SELECT MIN(price) AS min FROM xbox";
       
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
    //     echo "<h6> Minimum Price: $" . number_format($record['min'], 2)."</h6>";
    // }
    
    // function maxPrice() {
    //     global $conn;
    //     $sql = "SELECT MAX(price) AS max FROM xbox";
       
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
    //     echo "<h6> Maximum Price: $" . number_format($record['max'], 2)."</h6>";
    // }
    
    if(isset($_GET['deleteg'])) {
    
        deleteGame();
        echo "<h6>Game Deleted</h6>";
    }
    
    // if(isset($_GET['avg'])) {
    //     avgPrice();
    // }
    // if(isset($_GET['max'])) {
    //     maxPrice();
    // }
    // if(isset($_GET['min'])) {
    //     minPrice();
    // }
    function updateGame() {
        global $conn;
        if(isset($_GET['update'])) {
            $console = $_GET['uconsole'];
            $name = $_GET['name'];
            $rating = $_GET['urating'];
            $price = $_GET['uprice'];
            
            $sql = "UPDATE xbox SET console = '". $console ."', price = " . $price . ", rating = " . $rating . " WHERE name = '". $name . "'";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
    function addGame() {
        global $conn;
        if(isset($_GET['addgame'])){
            $name = $_GET['nname'];
            $console = $_GET['nconsole'];
            $developer = $_GET['ndeveloper'];
            $genre = $_GET['genre'];
            $id = $_GET['id'];
            $players = $_GET['nplayers'];
            $url = $_GET['nurl'];
            $year = $_GET['nyear'];
            $online = $_GET['online'];
            $rating = $_GET['nrating'];
            $price = $_GET['nprice'];
            
            $sql = "INSERT INTO xbox VALUES ('" . $name ."', '" .$console . "', '".$developer."', ".$id.", '" .$genre . "', " . $players . 
                    ", '" . $online . "', " .$price. ", " .$year. ", " .$rating. ", '" .$url. "');";
                    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "<h5>Game has been added</h5>";
        }
        
    }
    addGame();
    updateGame();
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Games </title>
        <style>
            h6 {
                color:red;
            }
            h5 {
                color:green;
            }
            #ajax {
                display:none;
            }
        </style>
        <script>
            $(document).ready(function(){
        
                $("#avg").click(function(event){
                    
                    $.ajax({
        
                        type: "GET",
                        url: "api.php",
                        dataType: "json",
                        data: {"avg" : $(this).attr("avg") },
                        success: function(data,status) {
                                $('#ajax').empty();
                                $('#ajax').append("Average Price: $" + data.avg);
                                $('#ajax').show();
                            

                        },
                        complete: function(data,status) {
                        }
                        
                        });//ajax
                    
                });
                $("#min").click(function(event){
                    
                    $.ajax({
        
                        type: "GET",
                        url: "api.php",
                        dataType: "json",
                        data: {"min" : $(this).attr("min") },
                        success: function(data,status) {
                                $('#ajax').empty();
                                $('#ajax').append("Minimum Price: $" + data.avg);
                                $('#ajax').show();
                            

                        },
                        complete: function(data,status) {
                        }
                        
                        });//ajax
                    
                });
                $("#max").click(function(event){
                    
                    $.ajax({
        
                        type: "GET",
                        url: "api.php",
                        dataType: "json",
                        data: {"max" : $(this).attr("max") },
                        success: function(data,status) {
                                $('#ajax').empty();
                                $('#ajax').append("Maximum Price: $" + data.avg);
                                $('#ajax').show();
                            

                        },
                        complete: function(data,status) {
                        }
                        
                        });//ajax
                    
                });
        
             });
        </script>
    </head>
    <body>
        <div>
            <form>
                <input type="button" id="avg" value="AVG Price"> 
                <input type="button" id="min" value="Min Price">
                <input type="button" id="max" value="Max Price">
            </form>
            <h5 id="ajax"></h5>
        </div>
        <br><br>
        <div>
            <h4>DELETE GAME</h4>
            <form>
                Video Game Name: <input type="text" name="delete"><br>
                <input type="submit" name="deleteg" value="Delete Game!">
            </form>
        </div>
        <br>
        <div>
            <h4>Update Game</h4>
            <form>
                Video Game Name: <input name="name" type="text" ><br>
                Updated Game Price: <input name="uprice" type="text" ><br>
                Updated Game Console: <input name="uconsole" type="text" ><br>
                Updated Game Rating: <input name="urating" type="text" ><br>
                <input type="submit" name="update" value="Update Game!">
                
            </form>
        </div>
        <br>
        <div>
            <h4>Add Game:</h4>
            <form>
                Video Game Name<input name= "nname" type="text" ><br>
                Price<input name="nprice" type="text" ><br>
                Console<select name="nconsole">
                            <option value="ps4">PS4</option>
                            <option value="xbox">Xbox One</option>
                            <option value="switch">Nintendo Switch</option>
                        </select><br>
                Rating<input name="nrating"type="text" ><br>
                Genre <input name="genre" type="text"> <br>
                Year Realeased<input name="nyear" type="text" ><br>
                Number of Players<input name="nplayers" type="text" ><br>
                Developer<input name="ndeveloper" type="text" ><br>
                Game ID<input name="id" type="text" ><br>
                Online Play<input name="online" type="text" ><br>
                Picture URL<input name="nurl"type="text"><br>
                <input type="submit" name="addgame" value="Add Game!">
            </form>
        </div>
    </body>
</html>

<?php
    include 'footer.html';
?> 