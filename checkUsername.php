<?php

    include 'database2.php';
    
    $conn = getDatabaseConnection("heroku_d81b70c8a9675ca");
    
    $username = $_GET['username'];
    
   // $sql = "SELECT * FROM lab8_user WHERE username = ";
   
   $sql = "SELECT * FROM lab8_user WHERE username = :username ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute( array(":username"=> $username));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    
    echo json_encode($record);

?>