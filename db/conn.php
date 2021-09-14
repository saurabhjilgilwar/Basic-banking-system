<?php
//    development database
    $host = '127.0.0.1';
    $db = 'banking_db';
    $usern = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    //remote database connection
    $host = 'sql6.freemysqlhosting.net';
    $db = 'sql6437086';
    $usern = 'sql6437086';
    $pass = 'RRgdfCWt7t';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo = new PDO($dsn, $usern, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Hello Database';

    } catch(PDOException $e){
        throw new PDOException($e->getMessage());

    }

    require_once 'admin.php';
    require_once 'crud.php';
    $crud = new crud($pdo);
    $admin = new admin($pdo);

    $admin->insertAdmin("admin","password");
?>
