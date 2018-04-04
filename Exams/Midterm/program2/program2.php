<?php
    $sql1 = "SELECT lastName, firstName, country_of_birth FROM celebrity
            WHERE country_of_birth != 'USA' AND gender = 'F'";
    
    $sql2 = "SELECT movie_category, COUNT(movie_title), AVG(duration) FROM `movie` GROUP BY movie_category";
    
    $sql3 = "SELECT movie_title, movie_category, duration, company, release_year FROM `movie`
             WHERE release_year > 2000 ORDER BY duration DESC LIMIT 3";
    $sql3 = 
    $host = "localhost";
    $dbname = "midterm";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $dbConn->prepare($sql1);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    print_r($records);
    
    $stmt = $dbConn->prepare($sql2);
    $stmt->execute();
    $records = $stmt->fetch();
    
    print_r($records);
    
    $stmt = $dbConn->prepare($sql3);
    $stmt->execute();
    $records = $stmt->fetch();
    
    print_r($records);

?>