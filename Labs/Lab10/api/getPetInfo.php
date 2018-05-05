<?php

    include "../../../dbConn.php";
    $conn = getDatabaseConnection("pets");
    
    $sql = "SELECT *, YEAR(CURDATE()) - yob age FROM pets WHERE id = :id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(":id"=>$_GET['id']));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print json_encode($record);
    

?>