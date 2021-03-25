<?php
  require('./model/database.php');
  require('./model/admin_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatart = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
  }


  $results = get_all_admins();
  $title = 'Γραμματεια';

  include('./view/list_stuff.php');