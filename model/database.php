<?php
    $dsn = 'mysql:host=localhost;dbname=ge3-test';
    // $dsn = 'mysql:host=localhost;dbname=koutousi';
    $username = 'root';

    // χρησιμοποιούμε τον βρόχο try/catch της php
    // Εάν μέσα στο try-loop δημιουργηθεί κάποιο fatal error, τότε «πιάνει» το Exception (εδώ συγκεκριμένα είναι Exception του PDO) και το προσθέτει στην μεταβλητή $e και εκτελείται ο catch-βρόχος
    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        $error_message = 'Σφάλμα στη Βάση Δεδομένων: ';
        $error_message .= $e->getMessage();
        $link = ".";
        include('view/error.php');
        exit();
    }