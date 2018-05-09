<?php

    include "../../dbConn.php";
    $conn = getDatabaseConnection("pets");
    
    $sql = "SELECT *, AVG  FROM games ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    print json_encode($record);
    

?>