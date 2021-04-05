<?php
    $dsn = 'mysql:host=localhost;dbname=koutousi';
    $username = 'root';


    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = 'Σφάλμα στη Βάση Δεδομένων: ';
        $error_message .= $e->getMessage();
        $link = ".";
        include('view/error.php');
        exit();
    }