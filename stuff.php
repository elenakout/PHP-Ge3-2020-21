<?php
  require('./model/database.php');
  require('./model/user_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatar = '';

  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $lastname = $_SESSION["lastName"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
  }


  $results = get_users_by_role("admin");
  $title = 'Γραμματεια';

  include('./view/list_stuff.php');