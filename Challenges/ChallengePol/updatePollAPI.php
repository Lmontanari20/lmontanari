<?php

    include "../../dbConn.php";
    $conn = getDatabaseConnection("challenge");
    
    $sql = "SELECT * FROM answers WHERE 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print json_encode($record);
    

?>