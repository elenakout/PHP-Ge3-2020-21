<?php
  require('./model/database.php');
  require('./model/post_db.php');

  session_start();

  $name = $role = '';
  $results = get_limit_posts();
  $page = 'home';

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $name = $_SESSION["name"];
    $role = $_SESSION["role"];
  }

  include('./view/home_posts.php');
  // TODO if else statement if not posts show error page