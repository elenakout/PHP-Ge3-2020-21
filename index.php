<?php
  require('./model/database.php');
  require('./model/post_db.php');

  session_start();

  // Αρχικοποίηση μεταβλητών
  $name = $role = $userId = $avatart = '';

  // Τα τρία ποιό πρόσφατα άρθρα
  $results = get_limit_posts();
  $page = 'home';


  // Ανάθεση μεταβλητών αν ο χρήστης είναι συνδεμενος
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
    $avatar = $_SESSION['avatar'];
  }

  include('./view/home_posts.php');
  // TODO if else statement if not posts show error page