<?php
  require('./model/database.php');
  require('./model/post_db.php');

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


  $postId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);

  $results = get_single_post($postId);

  include('./view/single_post.php');
  // TODO if else statement if not posts show error page
