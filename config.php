<?php

    $host       = 'sql8.freemysqlhosting.net';
    $dbname     = 'sql8695355';
    $username   = 'sql8695355';
    $password   = '4PPwnPs4I5';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }


    // MySQL Database Name: gepeismonacemebi
    // MySQL Username: sosocixisdzireli
    // MySQL Database Name: gepeismonacemebi
    // MySQL User Password: bali10shauri
    // MySQL User Password Verification: bali10shauri
?>