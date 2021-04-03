<?php
  require('./model/database.php');
  require('./model/class_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatart = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $lastname = $_SESSION["lastName"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
  }


  $semester1 = get_classes_by_semester(1);
  $semester2 = get_classes_by_semester(2);
  $semester3 = get_classes_by_semester(3);

  include('./view/table_classes.php');
