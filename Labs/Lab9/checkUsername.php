<?php

    include "../../dbConn.php";
    $conn = getDatabaseConnection("c9");
    
    $username = $_GET['username'];
    
    $sql = "SELECT * FROM lab9_user WHERE username = :username";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print json_encode($record);
    

?>