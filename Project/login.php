<?php

    session_start();

    //print_r($_POST);  //displays values passed in the form
    include 'header.html';
    include '../dbConn.php';
    
    function login() {
    //print_r($record);
    if(isset($_POST['submit'])){
    $conn = getDatabaseConnection("games");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
          
    $sql = "SELECT * 
            FROM admin
            WHERE username = :username
            AND   password = :password";    
            
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
    
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //expecting one single record
        if (empty($record)) {
        
            echo "<h2>Wrong username or password!</h2>";
        
        } else {
        
            header("Location:update.php");
        
            //echo $record['firstName'] . " " . $record['lastName'];
            $_SESSION['user'] = $record['username'];
        
        }
        
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Log-In </title>
        <style>
            h2{
                color:red;
            }
        </style>
    </head>
    <body>
        <h3>Admin Log-In</h3>
        
        <br><br><br>
        
        <div>
            <form method="POST">
                Username: <input type="text" name="username">
                <br><br>
                Password: <input type="text" name="password">
                <br>
                <input type="submit" name="submit" value="Submit!">
            </form>
        </div>
    </body>
</html>

<?php
    login();
    include 'footer.html';
?> 