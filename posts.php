<?php
  require('./model/database.php');
  require('./model/post_db.php');

  session_start();

  $name = '';
  $role = '';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $name = $_SESSION["name"];
    $role = $_SESSION['role'];
  }

  $results = get_posts();

  include('./view/all_posts.php');
  // TODO if else statement if not posts show error page