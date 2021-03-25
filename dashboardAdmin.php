<?php
session_start();

// Αρχικοποίηση μεταβλητών
$name = $role = $userId = $avatart = '';

// Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION["name"];
  $role = $_SESSION['role'];
  $avatar = $_SESSION['avatar'];

  if($role != 'admin') {
    header("location: index.php");
    exit;
  }
}else {
  header("location: index.php");
  exit;
}

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
