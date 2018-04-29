<?php
    function getDatabaseConnection($dbName) {
        $host = "us-cdbr-iron-east-05.cleardb.net";
        $db = $dbName;
        $user = 'b7cf211277e89d';
        $pass = '59b4e319';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        $pdo = new PDO($dsn, $user, $pass, $opt);
        return $pdo;
    }